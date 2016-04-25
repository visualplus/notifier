<?php
/**
 * Created by PhpStorm.
 * User: programmer
 * Date: 2016-04-25
 * Time: 오후 3:05
 */

namespace Visualplus\Pusher\Contracts\MessageContainer;

use App\Member;

abstract class AbstractPushMessageContainer
{
    /**
     * @var string
     */
    protected $identifier;
    /**
     * @var array
     */
    protected $param;
    /**
     * @var Member
     */
    protected $member;

    /**
     * AbstractPushMessageContainer constructor.
     * @param Member $member
     * @param $identifier
     * @param array $param
     */
    public function __construct(Member $member, $identifier, array $param)
    {
        $this->identifier = $identifier;
        $this->param = $param;
        $this->member = $member;
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
     * @param $url
     * @return string
     */
    protected function makeUrl($url)
    {
        if (!starts_with($url, '/')) {
            $url = '/' . $url;
        }

        return env('APP_URL') . $url;
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