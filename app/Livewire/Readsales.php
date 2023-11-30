<?php

namespace App\Livewire;
use App\Models\Sale;
use Livewire\Component;

class Readsales extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $sales = Sale::where('id', $this->id)->get();
        return view('livewire.readsales',['sales'=>$sales]);
    }
}
