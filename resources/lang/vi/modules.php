<?php   
return [
    [
        'title' => 'QL Bài viết',
        'icon' => 'fa fa-file',
        'name' => ['post'],
        'subModule' => [
            [
                'title' => 'QL Nhóm Bài Viết',
                'route' => 'post.catalogue.index'
            ],
            [
                'title' => 'QL Bài Viết',
                'route' => 'post.post.index'
            ]
        ]
    ],
    [
        'title' => 'QL Thành Viên',
        'icon' => 'fa fa-user',
        'name' => ['user','permission'],
        'subModule' => [
            [
                'title' => 'QL Thành Viên',
                'route' => 'user.user.index'
            ],
            [
                'title' => 'QL Nhóm Thành Viên',
                'route' => 'user.catalogue.index'
            ],
            [
                'title' => 'QL Quyền',
                'route' => 'user.permission.index'
            ],   
        ]
    ],
    [
        'title' => 'Cấu hình chung',
        'icon' => 'fa fa-file',
        'name' => ['language','generate'],
        'subModule' => [
            [
                'title' => 'QL Ngôn ngữ',
                'route' => 'language.index'
            ],    
        ]
    ]
];
