<?php namespace Visualplus\Notifier\Contracts;

interface Message
{
    public function getSmsMessage();
    public function getAndroidMessage();
}