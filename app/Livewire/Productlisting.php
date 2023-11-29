<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Productlisting extends Component
{
    public $products,$id;
    public function mount()
    {
        $this->products = Product::all();

    }
    public function create()
    {
        return redirect()->to(route('createproduct'));
    }
    public function read($id)
    {
        return redirect()->to(route('readproduct',['id' ,$id]) );
    }

    public function delete($id)
    {
        $product = Product::find($id)->delete();
        session()->flash('delete', 'Successfully, data deleted.');
        $this->mount();
        return redirect()->to(route('productlisting'));
    }
    public function render()
    {
        return view('livewire.productlisting');
    }
}
