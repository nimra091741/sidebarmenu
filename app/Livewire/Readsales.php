<?php

namespace App\Livewire;

use App\Models\Sale;
use App\Models\Saledetail;
use App\Models\ProfitAndExpense;
use Livewire\Component;
use Illuminate\Support\Facades\App;

use Barryvdh\DomPDF\Facade\Pdf;



class Readsales extends Component
{
    public $id, $saledetail = [], $profit = [], $date;

    public function mount($id)
    {
        $this->id = $id;
    }
    public function render()
    {
        $sales = Sale::where('id', $this->id)->get();
        $this->profit = ProfitAndExpense::where('sales_id', $this->id)->get();
        $this->saledetail = Saledetail::where('sales_id', $this->id)->get();
        $data = ['sales' => $sales, 'profit' => $this->profit, 'saledetail' => $this->saledetail];
        return view('livewire.readsales', compact('sales'));
    }

}
