<?php   
return [
    [
        'title' => 'Article Management',
        'icon' => 'fa fa-file',
        'name' => ['post'],
        'subModule' => [
            [
                'title' => 'Article Group',
                'route' => 'post.catalogue.index'
            ],
            [
                'title' => 'Article',
                'route' => 'post.post.index'
            ]
        ]
    ],
    [
        'title' => 'User Management',
        'icon' => 'fa fa-user',
        'name' => ['user'],
        'subModule' => [
            [
                'title' => 'User',
                'route' => 'user.user.index'
            ],
            [
                'title' => 'User Group',
                'route' => 'user.catalogue.index'
            ],
            [
                'title' => 'Permission',
                'route' => 'user.permission.index'
            ], 
        ]
    ],
    [
        'title' => 'General',
        'icon' => 'fa fa-file',
        'name' => ['language'],
        'subModule' => [
            [
                'title' => 'Language',
                'route' => 'language.index'
            ],
        ]
    ]
];

