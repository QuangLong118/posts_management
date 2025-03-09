<?php

return [
    'auth'=>[
        'success'=>'Login successful',
        'error'=>'Email or password is incorrect',
    ],
    
    'dashboard'=>[],

    'user'=>[
        'user'=>[
            'index'=>[],
            'store'=>[
                'success'=>'Successfully added a new member',
                'error' =>'Failed to add a new member. Please try again',
            ],
            'update'=>[
                'success'=>'Member updated successfully',
                'error'=>'Failed to update the member. Please try again',
            ],
            'destroy'=>[
                'success'=>'Member deleted successfully',
                'error'=>'Failed to delete the member. Please try again',
            ],
        ],
        'catalogue'=>[
            'index'=>[],
            'store'=>[
                'success'=>'Successfully added a new member group',
                'error' =>'Failed to add a new member group. Please try again',
            ],
            'update'=>[
                'success'=>'Member group updated successfully',
                'error'=>'Failed to update the member group. Please try again',
            ],
            'destroy'=>[
                'success'=>'Member group deleted successfully',
                'error'=>'Failed to delete the member group. Please try again',
            ],
            'updatePermission'=>[
                'success'=>'Permissions updated successfully',
                'error'=>'Failed to update permissions. Please try again',
            ]
        ],
        'permission'=>[
            'index'=>[],
            'store'=>[
                'success'=>'Successfully added a new permission',
                'error' =>'Failed to add a new permission. Please try again',
            ],
            'update'=>[
                'success'=>'permissions updated successfully',
                'error'=>'Failed to update permissions. Please try again',
            ],
            'destroy'=>[
                'success'=>'permissions deleted successfully',
                'error'=>'Failed to delete permissions. Please try again',
            ],
        ],
    ],

    'post'=>[
        'post'=>[
            'index'=>[],
            'store'=>[
                'success'=>'Successfully added a new post',
                'error' =>'Failed to add a new post. Please try again',
            ],
            'update'=>[
                'success'=>'Post updated successfully',
                'error'=>'Failed to update the post. Please try again',
            ],
            'destroy'=>[
                'success'=>'Post deleted successfully',
                'error'=>'Failed to delete the post. Please try again',
            ],
        ],
        'catalogue'=>[
            'index'=>[],
            'store'=>[
                'success'=>'Successfully added a new post category',
                'error' =>'Failed to add a new post category. Please try again',
            ],
            'update'=>[
                'success'=>'Post category updated successfully',
                'error'=>'Failed to update the post category. Please try again',
            ],
            'destroy'=>[
                'success'=>'Post category deleted successfully',
                'error'=>'Failed to delete the post category. Please try again',
            ],
        ],
    ],

    'language'=>[
        'index'=>[],
        'store'=>[
            'success'=>'Successfully added a new language',
            'error' =>'Failed to add a new language. Please try again',
        ],
        'update'=>[
            'success'=>'Language updated successfully',
            'error'=>'Failed to update the language. Please try again',
        ],
        'destroy'=>[
            'success'=>'Language deleted successfully',
            'error'=>'Failed to delete the language. Please try again',
        ],
    ],
];
