<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\ProfitAndExpense;
use Livewire\Component;

class Updateprofitexpense extends Component
{
    public $sales_id, $sale_detail_id, $type, $description, $amount, $id, $error_message = "Your data is not updated";
    public function mount($id)
    {
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
                $owner = ProfitAndExpense::find($this->id);
                if ($owner) {
                    $owner->update([
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
            }
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
            DB::rollback();
        }
    }
    public function render()
    {
        return view('livewire.updateprofitexpense');
    }
}
