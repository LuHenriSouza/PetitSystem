<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fincash extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'fincash_id';

    protected $fillable = [
        'fincash_name',
        'fincash_value',
        'fincash_isFinished',
        'fincash_finalValue',
        'fincash_finalDate'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'fincash_finalDate'
    ];
}
