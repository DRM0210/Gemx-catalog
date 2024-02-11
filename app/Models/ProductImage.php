<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
