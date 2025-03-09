<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface{
    protected $model;
    public function __construct(Model $model){
        $this->model = $model;
    }
    public function all(array $relations = []){
        return $this->model->with($relations)->get();
    }
    public function findByID(int $modelID, array $column = ['*'], array $relation = []){
        return $this->model->select($column)->with($relation)->findOrFail($modelID);
    }
    public function findByCondition(array $condition=[]){
        $query = $this->model->newQuery();
        foreach($condition as $key => $val){
            $query->where($val[0], $val[1] , $val[2]);
        }
        return $query->first();
    }

    public function create(array $payload = []){
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $id=0,array $payload = []){
        $model = $this->findByID($id);
        return $model->update($payload);
    }
    public function updateByWhereIn(string $WhereInField = '',array $WhereIn = [], array $payload=[]){
        return $this->model->WhereIn($WhereInField,$WhereIn)->update($payload);
    }
    public function updateByWhere($condition = [], array $payload = []){
        $query = $this->model->newQuery();
        foreach($condition as $key => $val){
            $query->where($val[0], $val[1] , $val[2]);
        }
        return $query->update($payload);
    }

    public function delete(int $id = 0){
        return $this->findById($id)->delete();
    }
    public function forceDelete(int $id = 0){
        return $this->findById($id)->forceDelete();
    }
    public function forceDeleteByCondition(array $condition = []){
        $query = $this->model->newQuery();
        foreach($condition as $key => $val){
            $query->where($val[0], $val[1] , $val[2]);
        }
        return $query->forceDelete();
    }

    public function pagination(
        array $column = ['*'], 
        array $condition = [], 
        int $perPage = 1,
        array $extend = [],
        array $orderBy = ['id', 'DESC'],
        array $join = [],
        array $relations = [],
        array $rawQuery = []
        
    ){
        $query = $this->model->select($column);
        return $query  
                ->keyword($condition['keyword'] ?? null)
                ->publish($condition['publish'] ?? null)
                ->relationCount($relations ?? null)
                ->customWhere($condition['where'] ?? null)
                ->customWhereRaw($rawQuery['whereRaw'] ?? null)
                ->customJoin($join ?? null)
                ->customGroupBy($extend['groupBy'] ?? null)
                ->customOrderBy($orderBy ?? null)
                ->paginate($perPage)
                ->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

    public function createPivot($model,array $payload,string $relation = ''){
        return $model->{$relation}()->attach($model->id,$payload);
    }
    
}   
