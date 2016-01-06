<?php namespace Visualplus\Notifier;

class User implements Visualplus\Notifier\Contracts\User
{
    private $hp = '';
    private $androidDeviceId = '';

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
    public function setAndroidDeviceId($androidDeviceId)
    {
        $this->androidDeviceId = $androidDeviceId;
    }


}