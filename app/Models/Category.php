<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    // Define a relationship if products belong to a category
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
