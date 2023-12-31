<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    use HasFactory;

    protected $primaryKey = 'stock_id';

    protected $fillable = [
        'stock_qnt',
        'stock_validity',
        'prod_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'stock_validity' => 'datetime'
    ];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'prod_id');
    }
}
