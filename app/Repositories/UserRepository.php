<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\User;

/**
 * Class UserService
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface{
    protected $model;

    public function __construct(User $model){
        $this->model = $model;
    }

    public function pagination(array $column=['*'],array $condition=[], $perPage = 1,array $extend = [],array $relations = [],array $join = [], array $orderBy = [], array $rawQuery=[]){
        $query = $this->model->select($column)->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])){
                $query->where(function ($q) use ($condition) {
                    $q->where('name', 'LIKE', '%' . $condition['keyword'] . '%')
                      ->orWhere('email', 'LIKE', '%' . $condition['keyword'] . '%')
                      ->orWhere('address', 'LIKE', '%' . $condition['keyword'] . '%')
                      ->orWhere('phone', 'LIKE', '%' . $condition['keyword'] . '%');
                });
            }
            if(isset($condition['publish']) && $condition['publish'] != -1){
                $query->where('publish', '=', $condition['publish']);
            }
            if(isset($condition['user_catalogue_id']) && $condition['user_catalogue_id'] != 0){
                $query->where('user_catalogue_id', '=', $condition['user_catalogue_id']);
            }

            // return $query;
        })->with('user_catalogues');
        if(!empty($join)){
            $query->join(...$join);
        }
        // dd($query->toSql());
        return $query->paginate($perPage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

}   
