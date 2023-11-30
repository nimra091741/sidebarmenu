<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Saledetail;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class Updatesaledetail extends Component
{ public $product,$sales,$saledetails,

    $product_id, $sales_id, $product_price_with_profit, $product_quantity,$gross_price,$id, $error_message;
    public function mount($id)
    {
        $this->product = Product::select("id",'product_name')->get()->toArray();
        $this->sales = Sale::select("id",'date')->get()->toArray();
        $saledetails = Saledetail::where('id', $id)->first();
        $this->product_id = $saledetails->product_id;
        $this->sales_id = $saledetails->sales_id;
        $this->product_price_with_profit = $saledetails->product_price_with_profit;
        $this->product_quantity = $saledetails->product_quantity;
        $this->gross_price = $saledetails->gross_price;

    }
    public function edit()
    {
        $saledetails = $this->validate(
            [
                'product_id' => ['required'],
                'sales_id' => ['required'],
                'product_price_with_profit' => ['required'],
                'product_quantity' =>['required'],
                'gross_price'=>['required'],
            ]);
        try {
            //code...

            if ($this->id) {
                DB::beginTransaction();
                $saledetails = Saledetail::find($this->id);
                if (!empty($saledetails)) {
                    $saledetails->update([
                        'product_id' => $this->product_id,
                        'sales_id' => $this->sales_id,
                        'product_price_with_profit' => $this->product_price_with_profit,
                        'product_quantity' => $this->product_quantity,
                        'gross_price' =>$this->gross_price,
                    ]);
                    DB::commit();
                    session()->flash('message', "Sale details has been updated successfully");
                    return redirect('saledetaillisting');
                }
                    else{
                        throw  new \Exception('Data not found!!');
                    }
                }
        } catch (\Exception $e) {
            DB::rollback();
            $error_message='This data has been deleted recently';
            $this->error_message = $e->getMessage();
        }
    }
    public function render()
    {
        return view('livewire.updatesaledetail');
    }
}
