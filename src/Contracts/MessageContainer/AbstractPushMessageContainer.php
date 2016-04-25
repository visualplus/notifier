<?php
/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 2016-04-25
 * Time: 오후 3:05
 */

namespace Visualplus\Pusher\Contracts\MessageContainer;


abstract class AbstractPushMessageContainer
{
    /**
     * @var string
     */
    private $message;
    /**
     * @var string
     */
    private $identifier;
    /**
     * @var string
     */
    private $uniqueKey;
    /**
     * @var string
     */
    private $url;

    /**
     * AbstractPushMessageContainer constructor.
     * @param $message
     * @param $identifier
     * @param $uniqueKey
     * @param $url
     */
    public function __construct($message, $identifier, $uniqueKey, $url)
    {
        $this->message = $message;
        $this->identifier = $identifier;
        $this->uniqueKey = $uniqueKey;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->getMessageBody();
    }

    /**
     * @return array
     */
    public function getOptionsAsAndroidFormat()
    {
        return [
            'title' => '오투잡',
            'identifier' => $this->identifier,
            'unique_key' => $this->uniqueKey,
            'url' => url($this->url),
            'sound' => 'Y',
        ];
    }

    /**
     * @return array
     */
    public function getOptionsAsIosFormat()
    {
        return [
            'badge' => 0,
            'sound' => 'default',
            'custom' => [
                'identifier' => $this->identifier,
                'url' => url($this->url),
                'unique_key' => $this->uniqueKey,
            ],
        ];
    }

    /**
     * @return string
     */
    abstract protected function getMessageBody();
}