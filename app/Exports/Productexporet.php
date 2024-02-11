<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Product;

class Productexporet implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Product::query()
                ->select('products.*', 'brands.name as brand_name', 'categories.cat_name as category_name', 'groups.name as group_name')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('groups', 'products.group_id', '=', 'groups.id')
                ->orderBy('products.created_at', 'desc')
                ->get();
        return $products;
    }
}
