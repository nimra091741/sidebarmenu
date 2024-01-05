<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Createproduct extends Component
{


    public $product_name, $description, $amount, $product_type;

    // protected $rules =

    public function store()
    {
        $product = $this->validate(
            [
                'product_name' => ['required', 'string', 'max:225'],
                'description' => ['required',],
                'amount' => ['required'], //numeric
                'product_type' => ['required', 'in:Finish,Unfinished'],
            ]
        );
        Product::create($product);
        session()->flash('message', 'Product created successfully.');
        return redirect()->to(route('productlisting'));
    }
    public function render()
    {
        return view('livewire.createproduct');
    }
}
     // // Remove any existing commas from the amount
        // $formattedAmount = str_replace(',', '', $this->amount);
        // // Format the amount with commas after every three digits
        // $formattedAmount = number_format($formattedAmount, 3, '.', '');
        // dd($formattedAmount);
        // // Update the amount property with the formatted value
        // $this->amount = $formattedAmount;
        // $formattedAmount = number_format($this->amount, 3, ',', '');

        // $product = [
        //     'product_name' => $this->product_name,
        //     'description' => $this->description,
        //     'amount' => $formattedAmount,
        //     'product_type' => $this->product_type,
        // ];
