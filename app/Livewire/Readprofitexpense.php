<?php

namespace App\Livewire;
use App\Models\ProfitAndExpense;
use Livewire\Component;

class Readprofitexpense extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $profit = ProfitAndExpense::where('id', $this->id)->get();
        return view('livewire.readprofitexpense',['profit'=>$profit]);
    }
}
