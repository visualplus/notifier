<?php namespace Visualplus\Pusher;

use Visualplus\Pusher\Contracts\User;
use Visualplus\Pusher\Contracts\Message;

use Carbon\Carbon;

class Pusher
{
    /**
     * SMS 전송 클래스
     * @var
     */
    private $smsSender = '';

    /**
     * 안드로이드 푸시 클래스
     * @var
     */
    private $androidPusher = '';

    /**
     * Pusher constructor.
     */
    public function __construct()
    {
        $config = config('pusher');

        $this->smsSender = new $config['sms']['sender'];
        $this->androidPusher = new $config['android']['sender'];
    }

    public function Send(User $user, Message $message, $device = 'android')
    {
        if ($device == 'android') {
            $this->androidPusher->send($user->getAndroidDeviceId(), $message->getAndroidMessage());
        }

        $schedule = new config('pusher.schedule');

        $schedule->hp = $user->getHp();
        $schedule->content = $message->getSmsMessage();
        $schedule->sending_at = Carbon::now()->addMinutes(config('pusher.sms_after'))->format('Y-m-d H:i:00');
        $schedule->save();
    }
}