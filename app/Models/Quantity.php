<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    
    protected $table = 'quantities';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
