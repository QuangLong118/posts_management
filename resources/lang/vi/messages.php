<?php   
return [
    'dashboard'=>[
        'album'=>[
            'name'=>'Album Ảnh',
            'chooseImage'=>'Chọn Ảnh',
            'note'=>'Sử dụng nút chọn hình ảnh hoặc click vào đây để thêm hình ảnh',
        ],
        'breadcrumb' => [],
        'sidebar'=>[],
        'nav'=>[],
        'footer'=>[],
    ],
    
    'user'=>[
        'user' => [
            'name'=>'Họ và tên',
            'index' => [
                'title' => 'Quản lý Thành viên',
                'toolbox'=>[
                    'publishAll'=>'Xuất bản toàn bộ Thành viên đã chọn',
                    'unpublishAll' => 'Ngừng xuất bản toàn bộ Thành viên đã chọn',
                ],
                'filter' => [],
                'tableHeading' => 'Danh sách Thành viên',
            ],
            'delete' => [
                'title'=>'Xóa Thành viên',
                'confirm'=>'Bạn có chắc chắn muốn xóa Thành viên có email là: ',
                'note'=>'Lưu ý: Không thể khôi phục Thành viên sau khi xóa',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Thêm mới Thành viên',
                ],
                'edit'=> [
                    'title'=> 'Cập nhật Thành viên',
                ],
                'request'=>[
                    'generalInfo'=>'Nhập thông tin chung của người sử dụng',
                    'contactInfo'=>'Nhập thông tin liên hệ của người sử dụng',
                ],
            ],
        ],
        'catalogue'=>[
            'name' => 'Tên Nhóm Thành viên',
            'index' => [
                'title' => 'Quản lý Nhóm Thành viên',
                'toolbox'=>[
                    'publishAll'=>'Xuất bản toàn bộ Nhóm Thành viên đã chọn',
                    'unpublishAll' => 'Ngừng xuất bản toàn bộ Nhóm Thành viên đã chọn',
                ],
                'filter' => [],
                'tableHeading' => 'Danh sách Nhóm Thành viên',
            ],
            'delete' => [
                'title'=>'Xóa Nhóm Thành viên',
                'confirm'=>'Bạn có chắc chắn muốn xóa Nhóm Thành viên có tên là: ',
                'note'=>'Lưu ý: Không thể khôi phục Nhóm Thành viên sau khi xóa',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Thêm mới Nhóm Thành viên',
                ],
                'edit'=> [
                    'title'=> 'Cập nhật Nhóm Thành viên',
                ],
                'request'=>[
                    'generalInfo'=>'Nhập thông tin chung Nhóm Thành viên',
                ],
            ],
            'permission' => [
                'title'=>'Quản lý Quyền truy cập',
                'tableHeading' => 'Quản lý quyền truy cập',
            ],
        ],
        'permission' => [
            'name'=>'Quyền truy cập',
            'index' => [
                'title' => 'Quyền truy cập',
                'toolbox'=>[
                    'publishAll'=>'Xuất bản toàn bộ Quyền đã chọn',
                    'unpublishAll' => 'Ngừng xuất bản toàn bộ Quyền đã chọn',
                ],
                'filter' => [],
                'tableHeading' => 'Danh sách Quyền',
            ],
            'delete' => [
                'title'=>'Xóa Quyền',
                'confirm'=>'Bạn có chắc chắn muốn xóa Quyền có tên là: ',
                'note'=>'Lưu ý: Không thể khôi phục Quyền sau khi xóa',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Thêm mới Quyền',
                ],
                'edit'=> [
                    'title'=> 'Cập nhật Quyền',
                ],
                'request'=>[
                    'generalInfo'=>'Nhập thông tin chung của Quyền',
                ],
            ],
        ],
    ],

    'post'=>[
        'post' => [
            'name'=>'Tiêu đề bài viết',
            'index' => [
                'title' => 'Quản lý Bài viết',
                'toolbox'=>[
                    'publishAll'=>'Xuất bản toàn bộ Bài viết đã chọn',
                    'unpublishAll' => 'Ngừng xuất bản toàn bộ Bài viết đã chọn',
                ],
                'filter' => [],
                'tableHeading' => 'Danh sách Bài viết',
            ],
            'delete' => [
                'title'=>'Xóa Bài viết',
                'confirm'=>'Bạn có chắc chắn muốn xóa Bài viết có tên là: ',
                'note'=>'Lưu ý: Không thể khôi phục Bài viết sau khi xóa',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Thêm mới Bài viết',
                ],
                'edit'=> [
                    'title'=> 'Cập nhật Bài viết',
                ],
            ],
        ],
        'catalogue'=>[
            'name'=>'Tên Nhóm bài viết',
                'index' => [
                'title' => 'Quản lý Nhóm Bài viết',
                'toolbox'=>[
                    'publishAll'=>'Xuất bản toàn bộ Nhóm Bài viết đã chọn',
                    'unpublishAll' => 'Ngừng xuất bản toàn bộ Nhóm Bài viết đã chọn',
                ],
                'filter' => [],
                'tableHeading' => 'Danh sách Nhóm Bài viết',
            ],
            'delete' => [
                'title'=>'Xóa Nhóm Bài viết',
                'confirm'=>'Bạn có chắc chắn muốn xóa Nhóm Bài viết có tên là: ',
                'note'=>'Lưu ý: Không thể khôi phục Nhóm Bài viết sau khi xóa',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Thêm mới Nhóm Bài viết',
                ],
                'edit'=> [
                    'title'=> 'Cập nhật Nhóm Bài viết',
                ],
                'request'=>[
                    'generalInfo'=>'Nhập thông tin chung Nhóm Bài viết',
                ],
            ],
        ],
        'seo'=>[
            'config'=>'Cấu hình SEO',
            'unFillTitle'=>'Bạn chưa nhập tiêu đề SEO',
            'unFillCanonical'=>'Bạn chưa nhập đường dẫn',
            'unFillDescription'=>'Bạn chưa nhập mô tả SEO',
            'title'=>'Tiêu đề SEO',
            'keyword'=>'Từ khóa SEO',
            'description'=>'Mô tả SEO',
            'canonical'=>'Đường dẫn SEO',
        ],
        'noteRoot'=>'* Chọn Root nếu không có danh mục cha',
        'parentCatalogue'=>'Danh mục cha',
        'subCatalogue'=>'Danh mục phụ',
    ],

    'language' => [
        'name'=>'Tên ngôn ngữ',
        'index' => [
            'title' => 'Quản lý Ngôn ngữ',
            'toolbox'=>[
                'publishAll'=>'Xuất bản toàn bộ Ngôn ngữ đã chọn',
                'unpublishAll' => 'Ngừng xuất bản toàn bộ Ngôn ngữ đã chọn',
            ],
            'filter' => [],
            'tableHeading' => 'Danh sách Ngôn ngữ',
        ],
        'delete' => [
            'title'=>'Xóa Ngôn ngữ',
            'confirm'=>'Bạn có chắc chắn muốn xóa Ngôn ngữ có tên là: ',
            'note'=>'Lưu ý: Không thể khôi phục Ngôn ngữ sau khi xóa',
        ],
        'store'=>[
            'create'=>[
                'title'=> 'Thêm mới Ngôn ngữ',
            ],
            'edit'=> [
                'title'=> 'Cập nhật Ngôn ngữ',
            ],
            'request'=>[
                'generalInfo'=>'Nhập thông tin chung của Ngôn ngữ',
            ],
        ],
        'translate'=>[
            'title'=>'Tạo bản dịch'
        ]
    ],
        
    'default' => [
        'user'=>'Thành viên',
        'userCatalogue'=>'Nhóm Thành viên',
        'post'=>'Bài viết',
        'postCatalogue'=>'Nhóm bài viết',
        'choose' => 'Chọn',
        'record' => 'Bản ghi',
        'search' => 'Tìm kiếm',
        'avatar' => 'Ảnh đại diện',
        'email'=>'Email',
        'userCount'=>'Số thành viên',
        'address' => 'Địa chỉ',
        'phoneNumber'=>'Số điện thoại',
        'password' => 'Mật khẩu',
        'retypePassword' => 'Nhập lại mật khẩu',
        'birthday' => 'Ngày sinh',
        'province'=>'Thành phố',
        'district'=>'Quận/Huyện',
        'ward' => 'Phường/Xã',
        'description' => 'Mô tả',
        'action'=>'Thao tác',
        'dashboard' => 'Tổng quan',
        'logout'=>'Đăng xuất',
        'generalInfo' => 'Thông tin chung',
        'contactInfo' => 'Thông tin liên hệ',
        'noteMandatory'=>'Lưu ý : Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc',
        'save'=>'Lưu lại',
        'delete'=>'Xóa dữ liệu',
        'people' => 'Người',
        'advanceConfig'=>'Cấu hình nâng cao',
        'status'=>'Tình trạng',
        'publish'=>'Xuất bản',
        'unpublish'=>'Ngừng xuất bản',
        'navigation'=>'Điều hướng',
        'follow'=>'Theo dõi',
        'unfollow'=>'Ngừng theo dõi',
        'shortDescription'=>'Mô tả ngắn',
        'uploadMultiImage'=>'Tải lên nhiều ảnh',
        'content'=>'Nội dung',
        'character'=>'ký tự',
        'location'=>'Vị trí',
        'image' => 'Ảnh',
        'title'=>'Tiêu đề',
    ],

    'publish' => [
        '0' => 'Không xuất bản',
        '1' => 'Xuất bản',
    ],
    'follow' => [
        '0' => 'Không theo dõi',
        '1' => 'Theo dõi',
    ], 
];
