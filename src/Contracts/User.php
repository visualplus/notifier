<?php namespace Visualplus\Pusher\Contracts;

interface User
{
    /**
     * @return string
     */
    public function getHp();

    /**
     * @return array
     */
    public function getAndroidDeviceId();

    /**
     * @return array
     */
    public function getIosDeviceId();
}