<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    protected $primaryKey = 'group_id';

    protected $fillable = [
        'group_name'
    ];


    public function prodGroups()
    {
        return $this->hasMany(ProdGroup::class, 'group_id', 'group_id');
    }
}
