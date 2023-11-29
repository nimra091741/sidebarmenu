<?php

namespace App\Livewire;
use App\Models\Product;
use Laravel\Prompts\Prompt;
use Livewire\Component;

class Createproduct extends Component
{


    public $product_name, $description, $amount, $product_type;

    public function store()
    {
        $product = $this->validate(
            [
                'product_name' => ['required','string','max:225'],
                'description' => ['required','string'],
                'amount' => ['required'],
                'product_type' =>['required','string'],
            ]);

            Product::create($product);

            session()->flash('message','Product created successfully.');
            return redirect()->to(route('productlisting'));
    }
    public function render()
    {
        return view('livewire.createproduct');
    }
}
