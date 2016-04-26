<?php namespace Visualplus\Pusher;

use Davibennun\LaravelPushNotification\PushNotification;
use Visualplus\Pusher\Contracts\User;
use Visualplus\Pusher\Contracts\Message;

use Carbon\Carbon;

class Pusher
{
    /**
     * @var PushNotification
     */
    private $pushNotification;

    /**
     * Pusher constructor.
     */
    public function __construct()
    {
        $this->pushNotification = new PushNotification();
    }

    /**
     * @param User $user
     * @param Message $message
     * @param string $uniqueKey
     * @param bool $sms_immediately
     */
    public function send(User $user, Message $message, $uniqueKey, $sms_immediately = false)
    {
        $config = config('pusher');

        if (count($user->getAndroidDeviceId()) > 0) {
            foreach ($user->getAndroidDeviceId() as $androidDeviceId) {
                $this->pushNotification->app('android')->to($androidDeviceId)->send(
                    '',
                    array_merge(['msg' => $message->getPushMessage()], $message->getPushMessageOptionAsAndroidFormat())
                );
            }
        }

        if (count($user->getIosDeviceId()) > 0) {
            foreach ($user->getIosDeviceId() as $iosDeviceId) {
                $this->pushNotification->app('ios')->to($iosDeviceId)->send(
                    $message->getPushMessage(),
                    $message->getPushMessageOptionAsIosFormat()
                );
            }
        }

        // 핸드폰번호가 세팅되어있으면 문자보내기 큐에다 저장
        if ($user->getHp()) {
            $schedule = new $config['schedule'];

            $timeOffset = config('pusher.sms_after');
            if ($sms_immediately) {
                $timeOffset = 0;
            }

            $schedule->hp = $user->getHp();
            $schedule->content = $message->getSmsMessage();
            $schedule->unique_key = $uniqueKey;
            $schedule->sending_at = Carbon::now()->addMinutes($timeOffset)->format('Y-m-d H:i:00');

            $schedule->save();
        }
    }

    /**
     * @param $uniqueKey
     */
    public function exclude($uniqueKey)
    {
        $config = config('pusher');
        $schedule = new $config['schedule'];

        $schedule->where('unique_key', '=', $uniqueKey)->delete();
    }
}