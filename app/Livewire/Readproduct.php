<?php

namespace App\Livewire;

use Livewire\Component;

class Readproduct extends Component
{public $id;
 public function mount($id)
 {
$this->id=$id;
dd($id);
 }
    public function render()
    {
        return view('livewire.readproduct');
    }
}
