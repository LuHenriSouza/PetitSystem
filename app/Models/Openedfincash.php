<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Openedfincash extends Model
{
    use HasFactory;

    protected $primaryKey = 'openfincash_id';

    protected $fillable = [
        'openfincash_name',
        'openfincash_value',
        'openfincash_isFinished'
    ];

    public function finishedFincashes()
    {
        return $this->hasMany(FinishedFincash::class, 'openfincash_id');
    }
}
