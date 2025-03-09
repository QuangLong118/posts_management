<?php

return [
    'auth'=>[
        'success'=>'登录成功',
        'error'=>'邮箱或密码错误',
    ],
    
    'dashboard'=>[],

    'user'=>[
        'user'=>[
            'index'=>[],
            'store'=>[
                'success'=>'成功添加新成员',
                'error' =>'添加新成员失败，请重试',
            ],
            'update'=>[
                'success'=>'成员更新成功',
                'error'=>'更新成员失败，请重试',
            ],
            'destroy'=>[
                'success'=>'成员删除成功',
                'error'=>'删除成员失败，请重试',
            ],
        ],
        'catalogue'=>[
            'index'=>[],
            'store'=>[
                'success'=>'成功添加新成员组',
                'error' =>'添加新成员组失败，请重试',
            ],
            'update'=>[
                'success'=>'成员组更新成功',
                'error'=>'更新成员组失败，请重试',
            ],
            'destroy'=>[
                'success'=>'成员组删除成功',
                'error'=>'删除成员组失败，请重试',
            ],
            'updatePermission'=>[
                'success'=>'权限更新成功',
                'error'=>'更新权限失败，请重试',
            ]
        ],
        'permission'=>[
            'index'=>[],
            'store'=>[
                'success'=>'成功添加新权限',
                'error' =>'添加新权限失败，请重试',
            ],
            'update'=>[
                'success'=>'权限更新成功',
                'error'=>'更新权限失败，请重试',
            ],
            'destroy'=>[
                'success'=>'权限删除成功',
                'error'=>'删除权限失败，请重试',
            ],
        ],
    ],

    'post'=>[
        'post'=>[
            'index'=>[],
            'store'=>[
                'success'=>'成功添加新文章',
                'error' =>'添加新文章失败，请重试',
            ],
            'update'=>[
                'success'=>'文章更新成功',
                'error'=>'更新文章失败，请重试',
            ],
            'destroy'=>[
                'success'=>'文章删除成功',
                'error'=>'删除文章失败，请重试',
            ],
        ],
        'catalogue'=>[
            'index'=>[],
            'store'=>[
                'success'=>'成功添加新文章分类',
                'error' =>'添加新文章分类失败，请重试',
            ],
            'update'=>[
                'success'=>'文章分类更新成功',
                'error'=>'更新文章分类失败，请重试',
            ],
            'destroy'=>[
                'success'=>'文章分类删除成功',
                'error'=>'删除文章分类失败，请重试',
            ],
        ],
    ],

    'language'=>[
        'index'=>[],
        'store'=>[
            'success'=>'成功添加新语言',
            'error' =>'添加新语言失败，请重试',
        ],
        'update'=>[
            'success'=>'语言更新成功',
            'error'=>'更新语言失败，请重试',
        ],
        'destroy'=>[
            'success'=>'语言删除成功',
            'error'=>'删除语言失败，请重试',
        ],
    ],
];
