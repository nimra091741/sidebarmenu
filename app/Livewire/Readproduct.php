<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Readproduct extends Component
{

    public $product,$product_name, $description, $amount, $product_type, $id;

    public function mount($id)
    {
        $product = Product::where('id', $id)->first();
        $this->product_name = $product->product_name;
        $this->description = $product->description;
        $this->amount = $product->amount;
        $this->product_type = $product->product_type;
    }

    public function render()
    {

        return view('livewire.readproduct');
    }
}
