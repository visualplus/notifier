<?php namespace Visualplus\Pusher\Contracts;

interface Message
{
    /**
     * @return string
     */
    public function getSmsMessage();

    /**
     * @return string
     */
    public function getPushMessage();

    /**
     * @return array
     */
    public function getPushMessageOptionAsAndroidFormat();

    /**
     * @return array
     */
    public function getPushMessageOptionAsIosFormat();

    /**
     * @return string
     */
    public function getUniqueKey();
}