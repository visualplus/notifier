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
    public function __construct($smsMessage, AbstractPushMessageContainer $pushMessage = null)
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
    public function getUniqueKey()
    {
        if ($this->pushMessage !== null) {
            return $this->pushMessage->getUniqueKey();
        }

        return '';
    }

    /**
     * @return string
     */
    public function getPushMessage()
    {
        if ($this->pushMessage !== null) {
            return $this->pushMessage->getMessage();
        }

        return '';
    }

    /**
     * @return array
     */
    public function getPushMessageOptionAsAndroidFormat()
    {
        if ($this->pushMessage !== null) {
            return $this->pushMessage->getOptionsAsAndroidFormat();
        }

        return [];
    }

    /**
     * @return array
     */
    public function getPushMessageOptionAsIosFormat()
    {
        if ($this->pushMessage !== null) {
            return $this->pushMessage->getOptionsAsIosFormat();
        }

        return [];
    }
}