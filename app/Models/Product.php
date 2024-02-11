<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'sku',
        'quantity',
        'unit_id',
        'brand_id',
        'category_id',
        'group_id',
        'purchase_price',
        'selling_price',
        'tax',
        'product_themlin',
        'product_image_id',
        'product_variants_id',
        'status',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariants::class);
    }
    public function quantity()
    {
        return $this->hasMany(Quantity::class);
    }
}

