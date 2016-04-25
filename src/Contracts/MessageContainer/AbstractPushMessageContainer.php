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
    private $identifier;
    /**
     * @var array
     */
    private $param;

    /**
     * AbstractPushMessageContainer constructor.
     * @param $identifier
     * @param array $param
     */
    public function __construct($identifier, array $param)
    {
        $this->identifier = $identifier;
        $this->param = $param;
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
            'unique_key' => $this->getUniqueKey(),
            'url' => $this->getUrl(),
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
                'url' => $this->getUrl(),
                'unique_key' => $this->getUniqueKey(),
            ],
        ];
    }

    /**
     * @return string
     */
    abstract protected function getMessageBody();

    /**
     * @return string
     */
    abstract protected function getUniqueKey();

    /**
     * @return string
     */
    abstract protected function getUrl();
}