<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Livewire\Component;

class Updateproduct extends Component
{
    public $product,$product_name, $description, $amount, $product_type, $id,$error_message;

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
                'description' => ['required'],
                'amount' => ['required'],
                'product_type' => ['required', 'string'],
            ]
        );
        try {
            DB::beginTransaction();
            if ($this->id) {
                $product = Product::find($this->id);
                if (!empty($product)) {
                    $product->update([
                        'product_name' => $this->product_name,
                        'description' => $this->description,
                        'amount' => $this->amount,
                        'product_type' => $this->product_type,
                    ]);
                    DB::commit();
                    session()->flash('message', "Product has been updated successfully");
                    return redirect('productlisting');
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
        return view('livewire.updateproduct');
    }
}
