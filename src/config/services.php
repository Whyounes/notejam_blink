<?php
return [
    'request' => [
        'class' => \blink\http\Request::class,
        'middleware' => [\App\Http\Middleware\AuthMiddleware::class],
    ],
    'response' => [
        'class' => \blink\http\Response::class,
        'middleware' => [],
    ],
    'session' => [
        'class' => 'blink\session\Manager',
        'expires' => 3600 * 24 * 15,
        'storage' => [
            'class' => 'blink\session\FileStorage',
            'path' => __DIR__ . '/../../runtime/sessions'
        ]
    ],
    'auth' => [
        'class' => 'blink\auth\Auth',
        'model' => 'App\Models\User',
    ],
    'log' => [
        'class' => 'blink\log\Logger',
        'targets' => [
            'file' => [
                'class' => 'blink\log\StreamTarget',
                'enabled' => true,
                'stream' => 'php://stderr',
                'level' => 'info',
            ]
        ],
    ],
];
