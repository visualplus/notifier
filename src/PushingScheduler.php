<?php namespace Visualplus\Pusher;

use Illuminate\Console\Command;
use Carbon\Carbon;

class PushingScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pusher:do';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $scheduleModelClass = config('pusher.schedule');
        $smsSenderClass = config('pusher.sms.sender');

        $scheduleModel = new $scheduleModelClass;
        $smsSender = new $smsSenderClass;

        $schedules = $scheduleModel->where('sending_at', '<=', Carbon::now()->format('Y-m-d H:i:00'))->get();
        foreach ($schedules as $schedule) {
            $smsSender->send($schedule->hp, $schedule->content);
            $schedule->delete();
        }
    }
}