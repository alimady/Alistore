<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Productslist extends Component
{
    public function render()
    {
        $products=Product::all();
         return view('livewire.productslist',compact('products'));
    }
}
