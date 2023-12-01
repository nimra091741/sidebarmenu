<?php

namespace App\Livewire;
use App\Models\Saledetail;

use App\Models\Product;


use Livewire\Component;

class Readsaledetail extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }


    public function render()
    {
        $saledetails = Saledetail::from('saledetails as sd')
        ->leftJoin('products as p', 'p.id', 'sd.product_id')
        ->where('sd.id', $this->id)
        ->select('sd.*','p.id as product_id', 'p.product_name as product_name')
        ->get();

    return view('livewire.readsaledetail', ['saledetail' => $saledetails]);
    }
}
