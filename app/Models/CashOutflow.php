<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CashOutflow extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey='outflow_id';

    protected $fillable = [
        'outflow_type_id',
        'fincash_id',
        'outflow_value'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function outflowType()
    {
        return $this->belongsTo(OutflowType::class, 'outflow_type_id');
    }

    public function fincash()
    {
        return $this->belongsTo(Fincash::class, 'fincash_id');
    }


}
