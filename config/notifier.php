<?php
return [
    'schedule' => '',

    'sms' => [
        'sender'    => '',
    ],

    'android' => [
        'sender'    => Visualplus\Notifier\AndroidPusher::class,
        'api_key'   => '',
    ],

    // 푸시를 보내고 나서 sms를 보내기까지의 시간(분)을 지정
    'sms_after' => 3,
];