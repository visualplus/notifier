<?php
return [
    'schedule' => Visualplus\Pusher\SmsScheduler::class,

    'sms' => [
        'sender'    => '',
    ],

    'android' => [
        'sender'    => Visualplus\Pusher\AndroidPusher::class,
        'api_key'   => '',
    ],

    // 푸시를 보내고 나서 sms를 보내기까지의 시간(분)을 지정
    'sms_after' => 3,
];