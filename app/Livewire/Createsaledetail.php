<?php

namespace App\Livewire;
use App\Models\Saledetail;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class Createsaledetail extends Component
{

    public $product_id, $sales_id, $product_price_with_profit, $product_quantity,$gross_price,$product,$sales;

    public function mount()
    {
        $this->product = Product::select("id",'product_name')->get()->toArray();
        $this->sales = Sale::select("id",'date')->get()->toArray();
    }
    public function store()
    {
        $saledetails = $this->validate(
            [
                'product_id' => ['required'],
                'sales_id' => ['required'],
                'product_price_with_profit' => ['required'],
                'product_quantity' =>['required'],
                'gross_price'=>['required'],
            ]);

            Saledetail::create($saledetails);
            session()->flash('message','Sale details created successfully.');
            return redirect()->to(route('saledetaillisting'));
    }
    public function render()
    {
        return view('livewire.createsaledetail');
    }
}
