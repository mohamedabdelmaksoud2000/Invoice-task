<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\Cart;
use App\Models\Product;

class HomePage extends Component
{
    use Cart;

    public $products ;
    
    public function add($product_id)
    {
        $product =$this->products->find($product_id);
        $this->addCart($product);
    }

    public function remove($product_id)
    {
        $product =$this->products->find($product_id);
        $this->removeCart($product);
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
