<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Province extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    protected $table = 'provinces';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function districts(){
        return $this->hasMany(District::class,'province_code', 'code');
    }
    
}
