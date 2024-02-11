<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    // Define a relationship if a product can have multiple colors
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
