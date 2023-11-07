<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Soldtoday extends Model
{
    use HasFactory;

    protected $primaryKey = 'prod_sold_id';

    protected $fillable = [
        'prod_id',
        'sale_id',
        'qnt',
        'unique_price',
        'total_price'
    ];
}
