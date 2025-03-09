<?php

return [
    'authRequest'=>[
        'email'=>[
            'required'=>'You have not entered an email.',
            'email'=> 'Your email is not in the correct format. Example: example@gmail.com',
        ],
        'password'=>'You have not entered a password.',
    ],

    'deletePostCatalogueRequest'=>[
        'isNodeCheck'=>[
            'fail'=>'Cannot delete due to existing subdirectories.',
        ]
    ],

    'storeLanguageRequest'=>[
        'name'=>[
            'required'=>'You have not entered a language name.',
        ],
        'canonical'=>[
            'required'=>'You have not entered a language keyword.',
            'unique' => 'The keyword already exists, please choose a different one.',
        ],  
    ],

    'storePostCatalogueRequest'=>[
        'name'=>[
            'required'=>'You have not entered a title.',
        ],
        'canonical'=>[
            'required'=> 'You have not entered a URL.',
            'unique'=> 'The URL already exists, please choose a different one.',
        ],
        'parent_id'=>[
            'gte'=>'You have not selected parent_id.',
        ],
    ],

    'storePostRequest'=>[
        'name'=>[
            'required'=>'You have not entered a title.',
        ],
        'canonical'=>[
            'required'=> 'You have not entered a URL.',
            'unique'=>'The URL already exists, please choose a different one.',
        ],
        'post_catalogue_id'=>[
            'gt'=>'You must enter a parent category.',
        ],
    ],

    'storeUserCatalogueRequest'=>[
        'name'=>[
            'required'=>'You have not entered a user group name.',
            'string'=>'The user group name must be a string.',
        ],
    ],

    'storeUserRequest'=>[
        'email'=>[
            'required' => 'You have not entered an email.',
            'email' => 'The email format is incorrect. Example: abc@gmail.com',
            'unique' => 'The email already exists. Please choose a different one.',
            'string' => 'The email must be a string.',
            'max' => 'The maximum length for an email is 191 characters.',
        ],
        'name'=>[
            'required' => 'You have not entered a full name.',
            'string' => 'The full name must be a string.',
        ],
        'user_catalogue_id'=>[
            'gt' => 'You have not selected a user group.',
        ],
        'password'=>[
            'required' => 'You have not entered a password.',
        ],
        're_password'=>[
            'required' => 'You must enter the password confirmation.',
            'same' => 'The passwords do not match.',
        ],
    ],

    'updateLanguageRequest'=>[
        'name'=>[
            'required' => 'You have not entered a language name.',
        ],
        'canonical'=>[
            'required' => 'You have not entered a language keyword.',
            'unique' => 'The keyword already exists, please choose a different one.',
        ]
    ],

    'updatePostCatalogueRequest'=>[
        'name'=>[
            'required' => 'You have not entered a title.',
        ],
        'canonical'=>[
            'required' => 'You have not entered a URL.',
            'unique' => 'The URL already exists, please choose a different one.',
        ],
    ],

    'updatePostRequest'=>[
        'name'=>[
            'required' => 'You have not entered a title.',
        ],
        'canonical'=>[
            'required' => 'You have not entered a URL.',
            'unique' => 'The URL already exists, please choose a different one.',
        ],
        'post_catalogue_id'=>[
            'gt' => 'You must enter a parent category.',
        ],
        'catalogue'=>[
            'array' => 'The category must be an array.',
            'integer' => 'Each category must be an integer.',
            'gt' => 'The root cannot be used as a subcategory.',
        ],
    ],

    'updateUserCatalogueRequest'=>[],

    'updateUserRequest'=>[
        'email'=>[
            'required' => 'You have not entered an email.',
            'email' => 'The email format is incorrect. Example: abc@gmail.com',
            'unique' => 'The email already exists. Please choose a different one.',
            'string' => 'The email must be a string.',
            'max' => 'The maximum length for an email is 191 characters.',
        ],
        'name'=>[
            'required' => 'You have not entered a full name.',
            'string' => 'The full name must be a string.',
        ],
        'user_catalogue_id'=>[
            'gt' => 'You have not selected a user group.',
        ],
    ],

    'storePermissionRequest' => [
        'name' => [
            'required' => 'You have not entered the permission name.',
        ],
        'canonical' => [
            'required' => 'You have not entered the permission keyword.',
            'unique' => 'The keyword already exists, please choose a different one.'
        ],
    ],

    'updatePermissionRequest' => [
        'name' => [
            'required' => 'You have not entered the permission name.',
        ],
        'canonical' => [
            'required' => 'You have not entered the permission keyword.',
            'unique' => 'The keyword already exists, please choose a different one.'
        ],
    ],
];
