<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finishedfincash extends Model
{
    use HasFactory;

    protected $primaryKey = 'finishfincash_id';

    protected $fillable = [
        'openfincash_id',
        'new_value'
    ];

    public function openedFincash()
    {
        return $this->belongsTo(OpenedFincash::class, 'openfincash_id');
    }
}
