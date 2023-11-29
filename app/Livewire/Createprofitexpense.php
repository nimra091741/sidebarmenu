<?php

namespace App\Livewire;
use App\Models\Sale;use App\Models\Saledetail;use App\Models\ProfitAndExpense;
use Livewire\Component;

class Createprofitexpense extends Component
{
    public $sales,$saledetails;
    public $sales_id, $sale_detail_id, $type, $description, $amount;

    public function mount()
    {
        $this->sales=Sale::select('id','date')->get()->toArray();
        $this->saledetails=Saledetail::select('id','product_price_with_profit')->get()->toArray();
    }
    public function store()
    {
        $profit = $this->validate(
            [
                'sales_id' => ['required'],
                'sale_detail_id' => ['required'],
                'type' => ['required'],
                'description' =>['required'],
                'amount'=>['required']
            ]);
            ProfitAndExpense::create($profit);
            session()->flash('message','Data created successfully.');
            return redirect()->to(route('profitexpenselisting'));
    }
    public function render()
    {
        return view('livewire.createprofitexpense');
    }
}
