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
        ],
        'post' => [
            'action' => 'SignInController@postIndex'
        ]
    ],
    '/cabinet' => [
        'get' => [
            'action' => 'CabinetController@getIndex'
        ]
    ],
    '/logout' => [
        'get' => [
            'action' => 'SignInController@getLogout'
        ]
    ],
    '/upload' => [
        'post' => [
            'action' => 'AvatarController@getUpload'
        ]
    ]
];
