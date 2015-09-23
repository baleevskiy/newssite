<?php


return [
    'components' => [
        'dbHandler' => [
            'user' => 'user',
            'password' => 'password',
            'host' => 'localhost',
            'db' => 'newssite'
        ]
    ],
    'middleware' => [
        'GetRoute',
        'RunAction',
        'CompileTemplate',
        'EmbedLayout',
        'OutputBody'
    ],
    'routes' => [
        '/detail/<newsId:\d+>' => 'news/detail',
        '/' => 'news/index'
    ]
];