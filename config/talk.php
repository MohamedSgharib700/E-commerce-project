<?php

return [
    'user' => [
        'model' => 'App\User',
    ],
    'broadcast' => [
        'enable' => false,
        'app_name' => 'your-app-name',
        'pusher' => [
            'app_id' => '417052',
            'app_key' => '7bf780602c94e88bd3cd',
            'app_secret' => '04b9aa09a19599ee0a6b',
            'options' => [
                'cluster' => 'eu',
                'encrypted' => true
            ]
        ],
    ],
];
