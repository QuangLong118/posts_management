<?php   
return [
    'dashboard'=>[
        'album'=>[
            'name'=>'照片相册',
            'chooseImage'=>'选择图片',
            'note'=>'使用选择图片按钮或点击此处添加图片',
        ],
        'breadcrumb' => [],
        'sidebar'=>[],
        'nav'=>[],
        'footer'=>[],
    ],

    'user'=>[
        'user' => [
            'name'=>'姓名',
            'index' => [
                'title' => '会员管理',
                'toolbox'=>[
                    'publishAll'=>'发布所有选定的会员',
                    'unpublishAll' => '取消发布所有选定的会员',
                ],
                'filter' => [],
                'tableHeading' => '会员列表',
            ],
            'delete' => [
                'title'=>'删除会员',
                'confirm'=>'您确定要删除电子邮件为：',
                'note'=>'注意：删除后无法恢复会员',
            ],
            'store'=>[
                'create'=>[
                    'title'=> '添加新会员',
                ],
                'edit'=> [
                    'title'=> '更新会员信息',
                ],
                'request'=>[
                    'generalInfo'=>'输入用户的基本信息',
                    'contactInfo'=>'输入用户的联系方式',
                ],
            ],
        ],
        'catalogue'=>[
            'name' => '会员组名称',
            'index' => [
                'title' => '会员组管理',
                'toolbox'=>[
                    'publishAll'=>'发布所有选定的会员组',
                    'unpublishAll' => '取消发布所有选定的会员组',
                ],
                'filter' => [],
                'tableHeading' => '会员组列表',
            ],
            'delete' => [
                'title'=>'删除会员组',
                'confirm'=>'您确定要删除名称为：',
                'note'=>'注意：删除后无法恢复会员组',
            ],
            'store'=>[
                'create'=>[
                    'title'=> '添加新会员组',
                ],
                'edit'=> [
                    'title'=> '更新会员组',
                ],
                'request'=>[
                    'generalInfo'=>'输入会员组的基本信息',
                ],
            ],
            'permission' => [
                'title' => '管理权限',
                'tableHeading' => '管理权限',
            ],
        ],
        'permission' => [
            'name' => '权限',
            'index' => [
                'title' => '权限',
                'toolbox' => [
                    'publishAll' => '发布所有选定的权限',
                    'unpublishAll' => '取消发布所有选定的权限',
                ],
                'filter' => [],
                'tableHeading' => '权限列表',
            ],
            'delete' => [
                'title' => '删除权限',
                'confirm' => '您确定要删除名称为：',
                'note' => '注意：权限删除后无法恢复。',
            ],
            'store' => [
                'create' => [
                    'title' => '添加新权限',
                ],
                'edit' => [
                    'title' => '更新权限',
                ],
                'request' => [
                    'generalInfo' => '输入权限的一般信息',
                ],
            ],
        ],
    ],

    'post'=>[
        'post' => [
            'name'=>'文章标题',
            'index' => [
                'title' => '文章管理',
                'toolbox'=>[
                    'publishAll'=>'发布所有选定的文章',
                    'unpublishAll' => '取消发布所有选定的文章',
                ],
                'filter' => [],
                'tableHeading' => '文章列表',
            ],
            'delete' => [
                'title'=>'删除文章',
                'confirm'=>'您确定要删除名称为：',
                'note'=>'注意：删除后无法恢复文章',
            ],
            'store'=>[
                'create'=>[
                    'title'=> '添加新文章',
                ],
                'edit'=> [
                    'title'=> '更新文章',
                ],
            ],
        ],
        'catalogue'=>[
            'name'=>'文章组名称',
            'index' => [
                'title' => '文章分类管理',
                'toolbox'=>[
                    'publishAll'=>'发布所有选定的文章分类',
                    'unpublishAll' => '取消发布所有选定的文章分类',
                ],
                'filter' => [],
                'tableHeading' => '文章分类列表',
            ],
            'delete' => [
                'title'=>'删除文章分类',
                'confirm'=>'您确定要删除名称为：',
                'note'=>'注意：删除后无法恢复文章分类',
            ],
            'store'=>[
                'create'=>[
                    'title'=> '添加新文章分类',
                ],
                'edit'=> [
                    'title'=> '更新文章分类',
                ],
                'request'=>[
                    'generalInfo'=>'输入文章分类的基本信息',
                ],
            ],
        ],
        'seo'=>[
            'config'=>'SEO配置',
            'unFillTitle'=>'您尚未输入SEO标题',
            'unFillCanonical'=>'您尚未输入链接',
            'unFillDescription'=>'您尚未输入SEO描述',
            'title'=>'SEO标题',
            'keyword'=>'SEO关键词',
            'description'=>'SEO描述',
            'canonical'=>'SEO链接',
        ],
        'noteRoot'=>'* 如果没有上级分类，请选择Root',
        'parentCatalogue'=>'上级分类',
        'subCatalogue'=>'子分类',
    ],

    'language' => [
        'name'=>'语言名称',
        'index' => [
            'title' => '语言管理',
            'toolbox'=>[
                'publishAll'=>'发布所有选定的语言',
                'unpublishAll' => '取消发布所有选定的语言',
            ],
            'filter' => [],
            'tableHeading' => '语言列表',
        ],
        'delete' => [
            'title'=>'删除语言',
            'confirm'=>'您确定要删除名称为：',
            'note'=>'注意：删除后无法恢复语言',
        ],
        'store'=>[
            'create'=>[
                'title'=> '添加新语言',
            ],
            'edit'=> [
                'title'=> '更新语言',
            ],
            'request'=>[
                'generalInfo'=>'输入语言的基本信息',
            ],
        ],
    ],
    
    'default' => [
        'user'=>'会员',
        'userCatalogue'=>'会员组',
        'post'=>'文章',
        'postCatalogue'=>'文章分类',
        'choose' => '选择',
        'record' => '记录',
        'search' => '搜索',
        'avatar' => '头像',
        'email'=>'电子邮件',
        'userCount'=>'会员数量',
        'address' => '地址',
        'phoneNumber'=>'电话号码',
        'password' => '密码',
        'retypePassword' => '重新输入密码',
        'birthday' => '生日',
        'province'=>'城市',
        'district'=>'区/县',
        'ward' => '乡/镇/街道',
        'description' => '描述',
        'action'=>'操作',
        'dashboard' => '总览',
        'logout'=>'登出',
        'generalInfo' => '基本信息',
        'contactInfo' => '联系信息',
        'noteMandatory'=>'注意：标有 <span class="text-danger">(*)</span> 的字段为必填项',
        'save'=>'保存',
        'delete'=>'删除数据',
        'people' => '人',
        'advanceConfig'=>'高级配置',
        'status'=>'状态',
        'publish'=>'发布',
        'unpublish'=>'取消发布',
        'navigation'=>'导航',
        'follow'=>'关注',
        'unfollow'=>'取消关注',
        'shortDescription'=>'简要描述',
        'uploadMultiImage'=>'上传多张图片',
        'content'=>'内容',
        'character'=>'字符',
        'location'=>'位置',
        'image' => '图片',
        'title'=>'标题'
    ],

    'publish' => [
        '0' => '不发布',
        '1' => '发布',
    ],
    'follow' => [
        '0' => '不关注',
        '1' => '关注',
    ],
];
