<?php

namespace App\Livewire;

use App\Models\Product;

use App\Models\Sale;
use App\Models\Saledetail;
use App\Models\ProfitAndExpense;
use Livewire\Component;

class Createsale extends Component
{
    public $total_amount, $expenditure, $profit, $date, $product;
    public $type, $description, $amount; ///profit fields
    public $product_id,  $product_price_with_profit, $product_quantity, $gross_price; ///saledetail fields

public $sales_id,$sale_detail_id;
    public function mount()
    {

        $this->date = now()->format('Y-m-d');
        $this->product = Product::select("id", 'product_name')->get()->toArray();
    }

    public function updated()
    {

        $product = Product::where('id', $this->product_id)->select('amount')->first();

    }

    // public $saleData, $profit_expense, $saledetailData;
    public function store()
    {
        $saleData = $this->validate(
            [
                'total_amount' => ['required'],
                'expenditure' => ['required'],
                'profit' => ['required'],
                'date' => ['required'],
            ]
        );

        $saledetailData = $this->validate([
            'product_id' => ['required'],
            // 'sales_id' => ['required'],
            'product_price_with_profit' => ['required'],
            'product_quantity' => ['required'],
            'gross_price' => ['required'],
        ]);

        $profitData = $this->validate(
            [
                // 'sales_id' => ['required'],
                // 'sale_detail_id' => ['required'],
                'type' => ['required'],
                'description' => ['required'],
                'amount' => ['required']
            ]
        );


        $sales = Sale::create($saleData);
        $saleDsale_id = $sales->id;

        $saledetailData = [
            'product_id' => $this->product_id,
            'sales_id'=>  $saleDsale_id,
            'product_price_with_profit' => $this->product_price_with_profit,
            'product_quantity' => $this->product_quantity,
            'gross_price' => $this->gross_price,

        ];
        $saledetailData['sales_id'] = $sales->id;
        $detail=Saledetail::create($saledetailData);
        // dd($saledetailData);
        $detail_is = $detail->id;
        // dd($detail_is);
        // dd($profitData);
        $profitData =
            [
                'sales_id' =>$saleDsale_id,
                'sale_detail_id' => $detail_is,
                'type' =>$this->type,
                'description' =>$this->description,

                'amount' =>$this->amount,
            ];
        // dd($profitData);
        ProfitAndExpense::create($profitData);
        session()->flash('message', 'Sales created successfully.');
        return redirect()->to(route('salelisting'));
    }
    public function render()
    {

        return view('livewire.createsale');
    }
}
  // $sale_detail_array = [
        //     'name' => 'asdsad',
        //     'price' => '100',
        // ];
        // $sale_detail_array['sale_id'] = $sale->id;
        // dd($sale_detail_array);
