<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use Livewire\Component;

class Updatesales extends Component
{
    public  $sales,$total_amount, $expenditure, $profit, $date, $id, $error_message;

    public function mount($id)
    {
        $sales = Sale::where('id', $id)->first();
        $this->total_amount = $sales->total_amount;
        $this->expenditure = $sales->expenditure;
        $this->profit = $sales->profit;
        $this->date = $sales->date;
    }
    public function edit()
    {
        $sales = $this->validate(
            [
                'total_amount' => ['required'],
                'expenditure' => ['required'],
                'profit' => ['required'],
                'date' =>['required'],
            ]);

        try {
            DB::beginTransaction();

            if ($this->id) {

                $sales = Sale::find($this->id);
                if (!empty($sales)) {
                    $sales->update([
                        'total_amount' => $this->total_amount,
                        'expenditure' => $this->expenditure,
                        'profit' => $this->profit,
                        'date' => $this->date,
                    ]);
                    DB::commit();
                    session()->flash('message', "Sales has been updated successfully");
                    return redirect('salelisting');
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
        return view('livewire.updatesales');
    }
}
