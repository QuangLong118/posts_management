<?php

return [
    'authRequest'=>[
        'email'=>[
            'required'=>'您尚未输入电子邮件。',
            'email'=> '您的电子邮件格式不正确。例如：example$gmail.com',
        ],
        'password'=>'您尚未输入密码。',
    ],

    'deletePostCatalogueRequest'=>[
        'isNodeCheck'=>[
            'fail'=>'无法删除，因为仍然存在子目录',
        ]
    ],

    'storeLanguageRequest'=>[
        'name'=>[
            'required'=>'您尚未输入语言名称。',
        ],
        'canonical'=>[
            'required'=>'您尚未输入语言的关键字。',
            'unique' => '关键字已存在，请选择其他关键字',
        ],
    ],

    'storePostCatalogueRequest'=>[
        'name'=>[
            'required'=>'您尚未输入标题。',
        ],
        'canonical'=>[
            'required'=> '您尚未输入路径',
            'unique'=> '路径已存在，请选择其他路径',
        ],
        'parent_id'=>[
            'gte'=>'您尚未选择 parent_id',
        ],
    ],

    'storePostRequest'=>[
        'name'=>[
            'required'=>'您尚未输入标题。',
        ],
        'canonical'=>[
            'requried'=> '您尚未输入路径',
            'unique'=>'路径已存在，请选择其他路径',
        ],
        'post_catalogue_id'=>[
            'gt'=>'您必须输入父类别',
        ],
    ],

    'storeUserCatalogueRequest'=>[
        'name'=>[
            'required'=>'您尚未输入会员组名称',
            'string'=>'会员组名称必须是字符格式',
        ],
    ],

    'storeUserRequest'=>[
        'email'=>[
            'required' => '您尚未输入电子邮件。',
            'email' => '电子邮件格式不正确。例如：abc@gmail.com',
            'unique' => '电子邮件已存在。请选择其他电子邮件',
            'string' => '电子邮件必须是字符格式',
            'max' => '电子邮件最大长度为 191 个字符',
        ],
        'name'=>[
            'required' => '您尚未输入姓名',
            'string' => '姓名必须是字符格式',
        ],
        'user_catalogue_id'=>[
            'gt' => '您尚未选择会员组',
        ],
        'password'=>[
            'required' => '您尚未输入密码。',
        ],
        're_password'=>[
            'required' => '您必须输入确认密码。',
            'same' => '密码不匹配。',
        ],
    ],

    'updateLanguageRequest'=>[
        'name'=>[
            'required' => '您尚未输入语言名称。',
        ],
        'canonical'=>[
            'required' => '您尚未输入语言的关键字。',
            'unique' => '关键字已存在，请选择其他关键字'
        ]
    ],

    'updatePostCatalogueRequest'=>[
        'name'=>[
            'required' => '您尚未输入标题。',
        ],
        'canonical'=>[
            'required' => '您尚未输入路径',
            'unique' => '路径已存在，请选择其他路径',
        ],
    ],

    'updatePostRequest'=>[
        'name'=>[
            'required' => '您尚未输入标题。',
        ],
        'canonical'=>[
            'required' => '您尚未输入路径',
            'unique' => '路径已存在，请选择其他路径',
        ],
        'post_catalogue_id'=>[
            'gt' => '您必须输入父类别',
        ],
        'catalogue'=>[
            'array' => '类别必须是一个数组。',
            'integer' => '每个类别必须是一个整数。',
            'gt' => '无法将根目录作为子类别。',
        ],
    ],

    'updateUserCatalogueRequest'=>[],

    'updateUserRequest'=>[
        'email'=>[
            'required' => '您尚未输入电子邮件。',
            'email' => '电子邮件格式不正确。例如：abc@gmail.com',
            'unique' => '电子邮件已存在。请选择其他电子邮件',
            'string' => '电子邮件必须是字符格式',
            'max' => '电子邮件最大长度为 191 个字符',
        ],
        'name'=>[
            'required' => '您尚未输入姓名',
            'string' => '姓名必须是字符格式',
        ],
        'user_catalogue_id'=>[
            'gt' => '您尚未选择会员组',
        ],
    ],
    
    'storePermissionRequest' => [
        'name' => [
            'required' => '您尚未输入权限名称。',
        ],
        'canonical' => [
            'required' => '您尚未输入权限关键字。',
            'unique' => '该关键字已存在，请选择其他关键字。'
        ],
    ],

    'updatePermissionRequest' => [
        'name' => [
            'required' => '您尚未输入权限名称。',
        ],
        'canonical' => [
            'required' => '您尚未输入权限关键字。',
            'unique' => '该关键字已存在，请选择其他关键字。'
        ],
    ],
];
