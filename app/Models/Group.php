<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    // Define a relationship if a product can have multiple sizes
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
