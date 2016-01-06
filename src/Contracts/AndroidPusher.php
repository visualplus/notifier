<?php namespace Visualplus\Notifier\Contracts;

interface AndroidPusher {
    // 개별 전송
    public function send($device_id, $content);
}