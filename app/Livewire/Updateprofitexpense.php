<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\ProfitAndExpense;
use App\Models\Sale;
use App\Models\Saledetail;
use Livewire\Component;

class Updateprofitexpense extends Component
{
    public $sales, $saledetails, $sales_id, $sale_detail_id, $type, $description, $amount, $id, $error_message ;
    public function mount($id)
    {
        $this->sales = Sale::select('id', 'date')->get()->toArray();
        $this->saledetails = Saledetail::select('id', 'product_price_with_profit')->get()->toArray();
        $product = ProfitAndExpense::where('id', $id)->first();
        $this->sales_id = $product->sales_id;
        $this->sale_detail_id = $product->sale_detail_id;
        $this->type = $product->type;
        $this->description = $product->description;
        $this->amount = $product->amount;
    }
    public function edit()
    {
        $profit = $this->validate(
            [
                'sales_id' => ['required'],
                'sale_detail_id' => ['required'],
                'type' => ['required'],
                'description' => ['required'],
                'amount' => ['required'],
            ]
        );
        try {
            //code...

            if ($this->id) {
                DB::beginTransaction();
                $sales = ProfitAndExpense::find($this->id);
                if (!empty($sales)) {
                    $sales->update([
                        'sales_id' => $this->sales_id,
                        'sale_detail_id' => $this->sale_detail_id,
                        'type' => $this->type,
                        'description' => $this->description,
                        'amount' => $this->amount,
                    ]);
                    DB::commit();

                    session()->flash('message', "Profit and expense has been updated successfully");
                    return redirect('profitexpenselisting');
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
        return view('livewire.updateprofitexpense');
    }
}
