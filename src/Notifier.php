<?php namespace Visualplus\Notifier;

use Visualplus\Notifier\Contracts\User;
use Visualplus\Notifier\Contracts\Message;

use Carbon\Carbon;

class Notifier
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
     * Notifier constructor.
     */
    public function __construct()
    {
        $config = config('notifier');

        $this->smsSender = new $config['sms']['sender'];
        $this->androidPusher = new $config['android']['sender'];
    }

    public function Send(User $user, Message $message, $device = 'android')
    {
        if ($device == 'android') {
            $this->androidPusher->send($user->getAndroidDeviceId(), $message->getAndroidMessage());
        }

        $schedule = new config('notifier.schedule');

        $schedule->hp = $user->getHp();
        $schedule->content = $message->getSmsMessage();
        $schedule->sending_at = Carbon::now()->addMinutes(config('notifier.sms_after'))->format('Y-m-d H:i:00');
        $schedule->save();
    }
}