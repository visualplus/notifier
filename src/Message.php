<?php namespace Visualplus\Pusher;

class Message implements \Visualplus\Pusher\Contracts\Message
{
    private $smsMessage = '';
    private $androidMessage = '';

    /**
     * Message constructor.
     * @param $smsMessage
     * @param $androidMessage
     */
    public function __construct($smsMessage, $androidMessage)
    {
        $this->smsMessage = $smsMessage;
        $this->androidMessage = $androidMessage;
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
    public function getAndroidMessage()
    {
        return $this->androidMessage;
    }
}