<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutflowType extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'outflow_type_id';

    protected $fillable = [
        'outflow_type'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function cashOutflows()
    {
        return $this->hasMany(CashOutflow::class, 'outflow_type_id');
    }


}
