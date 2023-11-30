<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Readproduct extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $products = Product::where('id', $this->id)->get();
        return view('livewire.readproduct',['products'=>$products]);
    }
}
