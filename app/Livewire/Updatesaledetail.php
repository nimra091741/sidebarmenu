<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Saledetail;
use Livewire\Component;

class Updatesaledetail extends Component
{ public $product_id, $sales_id, $product_price_with_profit, $product_quantity,$gross_price,$id, $error_message="Your data is not updated";
    public function mount($id)
    {
        $product = Saledetail::where('id', $id)->first();
        $this->product_id = $product->product_id;
        $this->sales_id = $product->sales_id;
        $this->product_price_with_profit = $product->product_price_with_profit;
        $this->product_quantity = $product->product_quantity;
        $this->gross_price = $product->gross_price;
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
                $owner = Saledetail::find($this->id);
                if ($owner) {
                    $owner->update([
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
            }
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
            DB::rollback();
        }
    }
    public function render()
    {
        return view('livewire.updatesaledetail');
    }
}
