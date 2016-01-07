<?php namespace Visualplus\Pusher;

class User implements \Visualplus\Pusher\Contracts\User
{
    private $hp = '';
    private $androidDeviceId = [];

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
     * @return string
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


}