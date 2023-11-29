<?php

namespace App\Livewire;
use App\Models\Sale;
use Livewire\Component;

class Createsale extends Component
{
    public $total_amount, $expenditure, $profit, $date;

    public function store()
    {
        $product = $this->validate(
            [
                'total_amount' => ['required'],
                'expenditure' => ['required'],
                'profit' => ['required'],
                'date' =>['required'],
            ]);

            Sale::create($product);

            session()->flash('message','Sales created successfully.');
            return redirect()->to(route('productlisting'));
    }
    public function render()
    {
        return view('livewire.createsale');
    }
}
