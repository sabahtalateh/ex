<?php

return [
    '/reg' => [
        'get' => [
            'action' => 'RegisterController@getIndex'
        ],
        'post' => [
            'action' => 'RegisterController@postIndex'
        ]
    ],
    '/' => [
        'get' => [
            'action' => 'HelloController@getIndex'
        ]
    ],
    '/changeLang' => [
        'post' => [
            'action' => 'LanguageController@postSetLanguage'
        ]
    ],
    '/sign' => [
        'get' => [
            'action' => 'SignInController@getIndex'
        ]
    ]
];
