<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soldtoday extends Model
{
    use HasFactory;



    public function products()
    {
        return $this->BelongsToMany(Product::class,'product_soldtodays');
    }
}
