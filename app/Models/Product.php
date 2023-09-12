<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'prod_id';

    protected $fillable = [
        'prod_code',
        'prod_name',
        'prod_setor',
        'prod_price',
    ];

    protected $casts = [
        'prod_setor' => 'integer',
        'prod_price' => 'decimal:2', // 2 casas decimais
    ];

    public function soldtoday()
    {
        return $this->BelongsToMany(Soldtoday::class, 'product_soldtodays')
            ->withPivot(['qnt', 'unique_price', 'total_prace']);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    protected static function boot()
    {
        parent::boot();
    }
}
