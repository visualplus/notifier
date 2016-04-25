<?php namespace Visualplus\Pusher;

use Visualplus\Pusher\Contracts\Message;
use Visualplus\Pusher\Contracts\MessageContainer\AbstractPushMessageContainer;

class PusherMessage implements Message
{
    /**
     * @var string
     */
    private $smsMessage = '';
    /**
     * @var AbstractPushMessageContainer
     */
    private $pushMessage;

    /**
     * Message constructor.
     * @param string $smsMessage
     * @param AbstractPushMessageContainer $pushMessage
     */
    public function __construct($smsMessage, AbstractPushMessageContainer $pushMessage)
    {
        $this->smsMessage = $smsMessage;
        $this->pushMessage = $pushMessage;
    }

    /**
     * @return string
     */
    public function getSmsMessage()
    {
        return $this->smsMessage;
    }

    /**
     * @return string
     */
    public function getPushMessage()
    {
        return $this->pushMessage->getMessage();
    }

    /**
     * @return array
     */
    public function getPushMessageOptionAsAndroidFormat()
    {
        return $this->pushMessage->getOptionsAsAndroidFormat();
    }

    /**
     * @return array
     */
    public function getPushMessageOptionAsIosFormat()
    {
        return $this->pushMessage->getOptionsAsIosFormat();
    }
}