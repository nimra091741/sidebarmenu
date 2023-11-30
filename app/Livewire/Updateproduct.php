<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Livewire\Component;

class Updateproduct extends Component
{
    public $product_name, $description, $amount, $product_type, $id, $error_message="Your data is not updated";

    public function mount($id)
    {
        $product = Product::where('id', $id)->first();
        $this->product_name = $product->product_name;
        $this->description = $product->description;
        $this->amount = $product->amount;
        $this->product_type = $product->product_type;
    }
    public function edit()
    {
        $product = $this->validate(
            [
                'product_name' => ['required', 'string', 'max:225'],
                'description' => ['required', 'string'],
                'amount' => ['required'],
                'product_type' => ['required', 'string'],
            ]
        );
        try {
            //code...

            if ($this->id) {
                DB::beginTransaction();
                $owner = Product::find($this->id);
                if ($owner) {
                    $owner->update([
                        'product_name' => $this->product_name,
                        'description' => $this->description,
                        'amount' => $this->amount,
                        'product_type' => $this->product_type,
                    ]);
                    DB::commit();

                    session()->flash('message', "Product has been updated successfully");
                    return redirect('productlisting');
                }
            }
        } catch (\Exception $e) {
            $this->error_message = $e->getMessage();
            DB::rollback();
        }
    }
    public function render()
    {
        return view('livewire.updateproduct');
    }
}
