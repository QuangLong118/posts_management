<?php

return [
    'authRequest'=>[
        'email'=>[
            'required'=>'Bạn chưa nhập email.',
            'email'=> 'Email của bạn chưa đúng định dạng. Ví dụ:example$gmail.com',
        ],
        'password'=>'Bạn chưa nhập mật khẩu.',
    ],

    'deletePostCatalogueRequest'=>[
        'isNodeCheck'=>[
            'fail'=>'Không thể xóa do còn thư mục con',
        ]
    ],

    'storeLanguageRequest'=>[
        'name'=>[
            'required'=>'Bạn chưa nhập vào tên ngôn ngữ.',
        ],
        'canonical'=>[
            'required'=>'Bạn chưa nhập vào từ khóa của ngôn ngữ.',
            'unique' => 'Từ khóa đã tồn tại hãy chọn từ khóa khác',
        ],
    ],

    'storePostCatalogueRequest'=>[
        'name'=>[
            'required'=>'Bạn chưa nhập vào ô tiêu đề.',
        ],
        'canonical'=>[
            'required'=> 'Bạn chưa nhập vào ô đường dẫn',
            'unique'=> 'Đường dẫn đã tồn tại, Hãy chọn đường dẫn khác',
        ],
        'parent_id'=>[
            'gte'=>'Bạn chưa chọn parent_id',
        ],
    ],

    'storePostRequest'=>[
        'name'=>[
            'required'=>'Bạn chưa nhập vào ô tiêu đề.',
        ],
        'canonical'=>[
            'requried'=> 'Bạn chưa nhập vào ô đường dẫn',
            'unique'=>'Đường dẫn đã tồn tại, Hãy chọn đường dẫn khác',
        ],
        'post_catalogue_id'=>[
            'gt'=>'Bạn phải nhập vào danh mục cha',
        ],
    ],

    'storeUserCatalogueRequest'=>[
        'name'=>[
            'required'=>'Bạn chưa nhập tên Nhóm thành viên',
            'string'=>'Tên Nhóm thành viên phải là dạng ký tự',
        ],
    ],

    'storeUserRequest'=>[
        'email'=>[
            'required' => 'Bạn chưa nhập vào email.',
            'email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'unique' => 'Email đã tồn tại. Hãy chọn email khác',
            'string' => 'Email phải là dạng ký tự',
            'max' => 'Độ dài email tối đa 191 ký tự',
        ],
        'name'=>[
            'required' => 'Bạn chưa nhập Họ Tên',
            'string' => 'Họ Tên phải là dạng ký tự',
        ],
        'user_catalogue_id'=>[
            'gt' => 'Bạn chưa chọn nhóm thành viên',
        ],
        'password'=>[
            'required' => 'Bạn chưa nhập vào mật khẩu.',
        ],
        're_password'=>[
            'required' => 'Bạn phải nhập vào ô Nhập lại mật khẩu.',
            'same' => 'Mật khẩu không khớp.',
        ],
    ],

    'updateLanguageRequest'=>[
        'name'=>[
            'required' => 'Bạn chưa nhập vào tên ngôn ngữ.',
        ],
        'canonical'=>[
            'required' => 'Bạn chưa nhập vào từ khóa của ngôn ngữ.',
            'unique' => 'Từ khóa đã tồn tại hãy chọn từ khóa khác'
        ]
    ],

    'updatePostCatalogueRequest'=>[
        'name'=>[
            'required' => 'Bạn chưa nhập vào ô tiêu đề.',
        ],
        'canonical'=>[
            'required' => 'Bạn chưa nhập vào ô đường dẫn',
            'unique' => 'Đường dẫn đã tồn tại, Hãy chọn đường dẫn khác',
        ],
    ],

    'updatePostRequest'=>[
        'name'=>[
            'required' => 'Bạn chưa nhập vào ô tiêu đề.',
        ],
        'canonical'=>[
            'required' => 'Bạn chưa nhập vào ô đường dẫn',
            'unique' => 'Đường dẫn đã tồn tại, Hãy chọn đường dẫn khác',
        ],
        'post_catalogue_id'=>[
            'gt' => 'Bạn phải nhập vào danh mục cha',
        ],
        'catalogue'=>[
            'array' => 'Danh mục phải là một mảng.',
            'integer' => 'Mỗi danh mục phải là một số nguyên.',
            'gt' => 'Không thể nhận root làm danh mục phụ.',
        ],
    ],

    'updateUserCatalogueRequest'=>[],

    'updateUserRequest'=>[
        'email'=>[
            'required' => 'Bạn chưa nhập vào email.',
            'email' => 'Email chưa đúng định dạng. Ví dụ: abc@gmail.com',
            'unique' => 'Email đã tồn tại. Hãy chọn email khác',
            'string' => 'Email phải là dạng ký tự',
            'max' => 'Độ dài email tối đa 191 ký tự',
        ],
        'name'=>[
            'required' => 'Bạn chưa nhập Họ Tên',
            'string' => 'Họ Tên phải là dạng ký tự',
        ],
        'user_catalogue_id'=>[
            'gt' => 'Bạn chưa chọn nhóm thành viên',
        ],
    ],

    'storePermissionRequest'=>[
        'name'=>[
            'required' => 'Bạn chưa nhập vào tên quyền truy cập',
        ],
        'canonical'=>[
            'required' => 'Bạn chưa nhập vào từ khóa của quyền truy cập.',
            'unique' => 'Từ khóa đã tồn tại hãy chọn từ khóa khác'
        ],
    ],

    'updatePermissionRequest'=>[
        'name'=>[
            'required' => 'Bạn chưa nhập vào tên quyền truy cập',
        ],
        'canonical'=>[
            'required' => 'Bạn chưa nhập vào từ khóa của quyền truy cập.',
            'unique' => 'Từ khóa đã tồn tại hãy chọn từ khóa khác'
        ],
    ],
];