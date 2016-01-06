<?php namespace Visualplus\Pusher\Contracts;

interface SmsSender {
    // 개별 전송
    public function send($hp, $content);
    // 개별 전송 (예약)
    public function sendAt($hp, $content, $reservDate);
}