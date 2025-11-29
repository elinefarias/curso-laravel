<?php

namespace App\Http\Services;
use App\Models\Product;

class ProductsService
{
    public function all():object {
        return Product::all();
    }

}