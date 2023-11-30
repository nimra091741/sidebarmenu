<?php

namespace App\Livewire;
use App\Models\Saledetail;

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
        $saledetail = Saledetail::where('id', $this->id)->get();
        return view('livewire.readsaledetail',['saledetail'=>$saledetail]);
    }
}
