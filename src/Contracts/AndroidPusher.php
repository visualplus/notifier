<?php namespace Visualplus\Pusher\Contracts;

interface AndroidPusher {
    // 개별 전송
    public function send($device_id, $content);
}