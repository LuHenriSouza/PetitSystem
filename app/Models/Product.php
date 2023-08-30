<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            // Add a timestamp into prod_code before Delete Product"
            $product->prod_code = $product->prod_code .'R'. now();
            $product->save();
        });
    }
}
