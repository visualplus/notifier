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

    /**
     * @param User $user
     * @param Message $message
     * @param string $uniqueKey
     */
    public function send(User $user, Message $message, $uniqueKey, $sms_immediately = false)
    {
        $config = config('pusher');

        // 안드로이드 디바이스 아이디가 있으면 푸시 전송
        if ($user->getAndroidDeviceId()) {
            $this->androidPusher->send($user->getAndroidDeviceId(), $message->getAndroidMessage());
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