<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use Livewire\Component;

class Updatesales extends Component
{
    public $total_amount, $expenditure, $profit, $date, $id, $error_message="Your data is not updated";

    public function mount($id)
    {
        $product = Sale::where('id', $id)->first();
        $this->total_amount = $product->total_amount;
        $this->expenditure = $product->expenditure;
        $this->profit = $product->profit;
        $this->date = $product->date;
    }
    public function edit()
    {
        $product = $this->validate(
            [
                'total_amount' => ['required'],
                'expenditure' => ['required'],
                'profit' => ['required'],
                'date' =>['required'],
            ]);

        try {
            //code...

            if ($this->id) {
                DB::beginTransaction();
                $owner = Sale::find($this->id);
                if ($owner) {
                    $owner->update([
                        'total_amount' => $this->total_amount,
                        'expenditure' => $this->expenditure,
                        'profit' => $this->profit,
                        'date' => $this->date,
                    ]);
                    DB::commit();

                    session()->flash('message', "Sales has been updated successfully");
                    return redirect('salelisting');
                }
            }
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
            DB::rollback();
        }
    }
    public function render()
    {
        return view('livewire.updatesales');
    }
}
