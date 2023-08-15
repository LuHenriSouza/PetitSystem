<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

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
        return $this->BelongsToMany(Soldtoday::class,'product_soldtodays');
    }
}
