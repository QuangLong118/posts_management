<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface{
    public function all(array $relations);
    public function findByID(int $id);
    public function findByCondition(array $condition);
    public function create(array $payload);
    public function update(int $id,array $payload);
    public function updateByWhere($condition, array $payload);
    public function delete(int $id);
    public function pagination(array $column,array $condition,int $perPage,array $extend, array $relations , array $join, array $orderBy, array $rawQuery);
    public function updateByWhereIn(string $WhereInField,array $WhereIn, array $payload);
    public function createPivot($model,array $payload,string $relation);
}