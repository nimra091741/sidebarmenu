<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;

class Productlisting extends Component
{

    use WithPagination;
    public function render()
    {
        return view('livewire.productlisting', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }

    public $error_message = "Deletion not done.";
    public function delete()
    {
        $product = Product::find($this->itemId);
        try {

            $product->delete();
            session()->flash('delete', 'Successfully, data deleted.');
        } catch (\Exception $e) {

            $this->error_message = $e->getMessage();
        }
        $this->delete_modal = false;
    }
    public $itemId,$delete_modal =false;

    public function openModal($id)
    {
        // dd(1);
        $this->delete_modal = true;
        $this->itemId = $id;
    }
    public function back()
    {
        $this->delete_modal = false;
    }
  // return redirect()->to(route('salelisting'));
//  dd( $this->itemId );

}
