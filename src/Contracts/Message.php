<?php namespace Visualplus\Pusher\Contracts;

interface Message
{
    public function getSmsMessage();
    public function getAndroidMessage();
}