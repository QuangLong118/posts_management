<?php   
return [
    [
        'title' => '管理帖子',  // Article Management
        'icon' => 'fa fa-file',
        'name' => ['post'],
        'subModule' => [
            [
                'title' => '文章组',  // Article Group
                'route' => 'post.catalogue.index'
            ],
            [
                'title' => '文章',  // Article
                'route' => 'post.post.index'
            ]
        ]
    ],
    [
        'title' => '用户管理',  // User Management
        'icon' => 'fa fa-user',
        'name' => ['user'],
        'subModule' => [
            [
                'title' => '用户',  // User
                'route' => 'user.user.index'
            ],
            [
                'title' => '用户组',  // User Group
                'route' => 'user.catalogue.index'
            ],
            [
                'title' => '允许', //Permission
                'route' => 'user.permission.index',
            ], 
        ]
    ],
    [
        'title' => '通用',  // General
        'icon' => 'fa fa-file',
        'name' => ['language'],
        'subModule' => [
            [
                'title' => '语言',  // Language
                'route' => 'language.index'
            ],

        ]
    ],
];


