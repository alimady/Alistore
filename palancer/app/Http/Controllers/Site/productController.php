<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;

class ProductController{
    public function index(){
        $product=Product::paginate(5);
        return response()->json($product);
    }
}