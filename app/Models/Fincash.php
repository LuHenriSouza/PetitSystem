<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
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

    public function cashOutflows()
    {
        return $this->hasMany(CashOutflow::class, 'fincash_id');
    }

    public function getDateFormatted(string $colunm,string $format)
    {
        return Carbon::parse($this->attributes[$colunm])->format($format); // Modify the format as needed
    }
}
