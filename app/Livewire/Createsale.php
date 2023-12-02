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
    public $sales_id, $sale_detail_id;
    public $product_amount;
    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->product = Product::select("id", 'product_name')->get()->toArray();
    }
    public function updated()
    {
        $product = Product::where('id', $this->product_id)->select('amount')->first();
        if (!empty($product)) {
            $this->product_price_with_profit = $product['amount'];
        }
    }
    public  $resetOccurred;
    protected $flag = true;

    public function resetField()
    {
        if ($this->flag == true)
        {
            $sale= $this->sale();
            $this->flag = false;
        }
        $sales=$sale->id;
        $saleDetail = $this->saledetails($sales);
        $saleDetail= $saleDetail->id;
        $this->profit($sales, $saleDetail);
        $this->product_id = null;
        $this->product_price_with_profit = null;
        $this->product_quantity = null;
        $this->gross_price = null;
        $this->type = null;
        $this->description = null;
        $this->amount = null;
        $this->resetOccurred = true;
    }
    public function sale()
    {
        $saleData = $this->validate([
            'total_amount' => ['required'],
            'expenditure' => ['required'],
            'profit' => ['required'],
            'date' => ['required'],
        ]);
        return Sale::create($saleData);
    }
    public function saledetails($sales)
    {
             $saledetailData = $this->validate([
            'product_id' => ['required'],
            'product_price_with_profit' => ['required'],
            'product_quantity' => ['required'],
            'gross_price' => ['required'],
        ]);
        $saledetailData['sales_id'] = $sales;
        return Saledetail::create($saledetailData);
    }

    public function profit($sales, $saleDetail)
    {
        $profitData = $this->validate([
                        'type' => ['required'],
                        'description' => ['required'],
                        'amount' => ['required']
                    ]);
                    $profitData['sales_id'] = $sales;
                    $profitData['sale_detail_id'] = $saleDetail;
        ProfitAndExpense::create($profitData);
    }

    public function store()
    {
        $sales = $this->sales();
        $saleDetail = $this->saledetails($sales);
        $this->profit($sales, $saleDetail);

        $this->resetOccurred = false;
        session()->flash('message', 'Sales created successfully.');
        return redirect()->to(route('salelisting'));
    }




    public function render()
    {

        return view('livewire.createsale');
    }
}
  // public function store()
    // {
    //     $saleData = $this->validate([
    //             'total_amount' => ['required'],
    //             'expenditure' => ['required'],
    //             'profit' => ['required'],
    //             'date' => ['required'],
    //         ]);
    //     $saledetailData = $this->validate([
    //         'product_id' => ['required'],
    //         'product_price_with_profit' => ['required'],
    //         'product_quantity' => ['required'],
    //         'gross_price' => ['required'],
    //     ]);
    //     $profitData = $this->validate([
    //             'type' => ['required'],
    //             'description' => ['required'],
    //             'amount' => ['required']
    //         ]);
    //     $sales = Sale::create($saleData);
    //     $saleDsale_id = $sales->id;
    //     $saledetailData = [
    //         'product_id' => $this->product_id,
    //         'sales_id'=>  $saleDsale_id,
    //         'product_price_with_profit' =>$this->product_price_with_profit,
    //         'product_quantity' => $this->product_quantity,
    //         'gross_price' => $this->gross_price,
    //     ];
    //     $saledetailData['sales_id'] = $sales->id;
    //     $detail=Saledetail::create($saledetailData);
    //     $detail_is = $detail->id;
    //     $profitData =
    //         [
    //             'sales_id' =>$saleDsale_id,
    //             'sale_detail_id' => $detail_is,
    //             'type' =>$this->type,
    //             'description' =>$this->description,
    //             'amount' =>$this->amount,
    //         ];
    //     ProfitAndExpense::create($profitData);
    //     session()->flash('message', 'Sales created successfully.');
    //     return redirect()->to(route('salelisting'));
    // }
