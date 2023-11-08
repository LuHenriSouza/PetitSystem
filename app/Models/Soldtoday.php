<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldtoday extends Model
{
    use HasFactory;

    protected $primaryKey = 'sale_id';

    protected $fillable = [
        'fincash_id'
    ];

    public function products()
    {
        return $this->BelongsToMany(Product::class,'product_soldtodays')
            ->withPivot(['qnt',
            'unique_price',
            'total_prace']);
    }
}
