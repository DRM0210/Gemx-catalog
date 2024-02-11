<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';

    // Define a relationship if products belong to a brand
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
