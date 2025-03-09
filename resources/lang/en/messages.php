<?php   
return [
    'dashboard'=>[
        'album'=>[
            'name'=>'Photo Album',
            'chooseImage'=>'Choose Image',
            'note'=>'Use the select image button or click here to add an image',
        ],
        'breadcrumb' => [],
        'sidebar'=>[],
        'nav'=>[],
        'footer'=>[],
    ],
    
    'user'=>[
        'user' => [
            'name'=>'Full Name',
            'index' => [
                'title' => 'User Management',
                'toolbox'=>[
                    'publishAll'=>'Publish all selected Users',
                    'unpublishAll' => 'Unpublish all selected Users',
                ],
                'filter' => [],
                'tableHeading' => 'User List',
            ],
            'delete' => [
                'title'=>'Delete User',
                'confirm'=>'Are you sure you want to delete the User with email: ',
                'note'=>'Note: Users cannot be restored after deletion',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Add New User',
                ],
                'edit'=> [
                    'title'=> 'Update User',
                ],
                'request'=>[
                    'generalInfo'=>'Enter general user information',
                    'contactInfo'=>'Enter user contact information',
                ],
            ],
        ],
        'catalogue'=>[
            'name' => 'User Group Name',
            'index' => [
                'title' => 'User Group Management',
                'toolbox'=>[
                    'publishAll'=>'Publish all selected User Groups',
                    'unpublishAll' => 'Unpublish all selected User Groups',
                ],
                'filter' => [],
                'tableHeading' => 'User Group List',
            ],
            'delete' => [
                'title'=>'Delete User Group',
                'confirm'=>'Are you sure you want to delete the User Group named: ',
                'note'=>'Note: User Groups cannot be restored after deletion',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Add New User Group',
                ],
                'edit'=> [
                    'title'=> 'Update User Group',
                ],
                'request'=>[
                    'generalInfo'=>'Enter general User Group information',
                ],
            ],
            'permission' => [
                'title' => 'Manage Permissions',
                'tableHeading' => 'Manage Permissions',
            ],
        ],
        'permission' => [
            'name' => 'Permissions',
            'index' => [
                'title' => 'Permissions',
                'toolbox' => [
                    'publishAll' => 'Publish All Selected Permissions',
                    'unpublishAll' => 'Unpublish All Selected Permissions',
                ],
                'filter' => [],
                'tableHeading' => 'Permissions List',
            ],
            'delete' => [
                'title' => 'Delete Permission',
                'confirm' => 'Are you sure you want to delete the permission named: ',
                'note' => 'Note: Permissions cannot be recovered after deletion.',
            ],
            'store' => [
                'create' => [
                    'title' => 'Add New Permission',
                ],
                'edit' => [
                    'title' => 'Update Permission',
                ],
                'request' => [
                    'generalInfo' => 'Enter general information of the permission',
                ],
            ],
        ],
    ],

    'post'=>[
        'post' => [
            'name'=>'Post Title',
            'index' => [
                'title' => 'Post Management',
                'toolbox'=>[
                    'publishAll'=>'Publish all selected Posts',
                    'unpublishAll' => 'Unpublish all selected Posts',
                ],
                'filter' => [],
                'tableHeading' => 'Post List',
            ],
            'delete' => [
                'title'=>'Delete Post',
                'confirm'=>'Are you sure you want to delete the Post named: ',
                'note'=>'Note: Posts cannot be restored after deletion',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Add New Post',
                ],
                'edit'=> [
                    'title'=> 'Update Post',
                ],
            ],
        ],
        'catalogue'=>[
            'name'=>'Article Group Name',
            'index' => [
                'title' => 'Post Group Management',
                'toolbox'=>[
                    'publishAll'=>'Publish all selected Post Groups',
                    'unpublishAll' => 'Unpublish all selected Post Groups',
                ],
                'filter' => [],
                'tableHeading' => 'Post Group List',
            ],
            'delete' => [
                'title'=>'Delete Post Group',
                'confirm'=>'Are you sure you want to delete the Post Group named: ',
                'note'=>'Note: Post Groups cannot be restored after deletion',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Add New Post Group',
                ],
                'edit'=> [
                    'title'=> 'Update Post Group',
                ],
                'request'=>[
                    'generalInfo'=>'Enter general Post Group information',
                ],
            ],
        ],
        'seo'=>[
            'config'=>'SEO Configuration',
            'unFillTitle'=>'You have not entered an SEO title',
            'unFillCanonical'=>'You have not entered a URL',
            'unFillDescription'=>'You have not entered an SEO description',
            'title'=>'SEO Title',
            'keyword'=>'SEO Keywords',
            'description'=>'SEO Description',
            'canonical'=>'SEO URL',
        ],
        'noteRoot'=>'* Select Root if there is no parent category',
        'parentCatalogue'=>'Parent Category',
        'subCatalogue'=>'Subcategory',
    ],

    'language' => [
            'name'=>'Language Name',
            'index' => [
                'title' => 'Language Management',
                'toolbox'=>[
                    'publishAll'=>'Publish all selected Languages',
                    'unpublishAll' => 'Unpublish all selected Languages',
                ],
                'filter' => [],
                'tableHeading' => 'Language List',
            ],
            'delete' => [
                'title'=>'Delete Language',
                'confirm'=>'Are you sure you want to delete the Language named: ',
                'note'=>'Note: Languages cannot be restored after deletion',
            ],
            'store'=>[
                'create'=>[
                    'title'=> 'Add New Language',
                ],
                'edit'=> [
                    'title'=> 'Update Language',
                ],
                'request'=>[
                    'generalInfo'=>'Enter general Language information',
                ],
            ],
        ],

    'default' => [
        'user'=>'User',
        'userCatalogue'=>'User Group',
        'post'=>'Post',
        'postCatalogue'=>'Post Group',
        'choose' => 'Choose',
        'record' => 'Record',
        'search' => 'Search',
        'avatar' => 'Avatar',
        'email'=>'Email',
        'userCount'=>'User Count',
        'address' => 'Address',
        'phoneNumber'=>'Phone Number',
        'password' => 'Password',
        'retypePassword' => 'Retype Password',
        'birthday' => 'Birthday',
        'province'=>'City',
        'district'=>'District',
        'ward' => 'Ward',
        'description' => 'Description',
        'action'=>'Actions',
        'dashboard' => 'Dashboard',
        'logout'=>'Logout',
        'generalInfo' => 'General Information',
        'contactInfo' => 'Contact Information',
        'noteMandatory'=>'Note: Fields marked <span class="text-danger">(*)</span> are required',
        'save'=>'Save',
        'delete'=>'Delete',
        'people' => 'People',
        'advanceConfig'=>'Advanced Configuration',
        'status'=>'Status',
        'publish'=>'Publish',
        'unpublish'=>'Unpublish',
        'navigation'=>'Navigation',
        'follow'=>'Follow',
        'unfollow'=>'Unfollow',
        'shortDescription'=>'Short Description',
        'uploadMultiImage'=>'Upload Multiple Images',
        'content'=>'Content',
        'character'=>'Characters',
        'location'=>'Location',
        'image' => 'Image',
        'title'=>'Title',
    ],
    
    'publish' => [
        '0' => 'Unpublished',
        '1' => 'Published',
    ],
    'follow' => [
        '0' => 'Nofollow',
        '1' => 'Follow',
    ],
];