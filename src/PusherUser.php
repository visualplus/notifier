<?php namespace Visualplus\Pusher;

use Visualplus\Pusher\Contracts\User;

class PusherUser implements User
{
    /**
     * @var string
     */
    private $hp = '';
    /**
     * @var array
     */
    private $androidDeviceId = [];
    /**
     * @var array
     */
    private $iosDeviceId = [];

    /**
     * @return string
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param string $hp
     */
    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return array
     */
    public function getAndroidDeviceId()
    {
        return $this->androidDeviceId;
    }

    /**
     * @param string $androidDeviceId
     */
    public function addAndroidDeviceId($androidDeviceId)
    {
        array_push($this->androidDeviceId, $androidDeviceId);
    }

    /**
     * @return array
     */
    public function getIosDeviceId()
    {
        return $this->iosDeviceId;
    }

    /**
     * @param string $iosDeviceId
     */
    public function addIosDeviceId($iosDeviceId)
    {
        array_push($this->iosDeviceId, $iosDeviceId);
    }
}