<?php

namespace App\Livewire;
use Livewire\WithPagination;
use App\Models\Product;
use Livewire\Component;

class Productlisting extends Component
{
    // public $products, $id;
     use WithPagination;

    public function render()
    {
        return view('livewire.productlisting', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(12),
        ]);
    }
    // public function mount()
    // {
    //     $products = Product::orderBy('created_at', 'desc')->get();

    // }
    public function create()
    {
        return redirect()->to(route('createproduct'));
    }
    public function import()
    {
        return redirect()->to(route('import'));
    }
    public function read($id)
    {
        return redirect()->to(route('readproduct', ['id', $id]));
    }
    public function update($id)
    {
        return redirect()->to(route('updateproduct', ['id', $id]));
    }




    public function delete($id)
    {
        $product = Product::find($id)->delete();
        session()->flash('delete', 'Successfully, data deleted.');
        // $this->mount();
        return redirect()->to(route('productlisting'));
    }

}
//     public function confirmDelete()
//     {
//         if ($this->id) {
//             Product::find($this->id)->delete();
//             session()->flash('delete', 'Successfully, data deleted.');
//             $this->mount(); // Reload the component data
//         }

//         // Optionally hide the modal
//         $this->dispatch('hide-delete-confirmation');
//     }

//     public function hideDeleteConfirmation()
// {
//     $this->dispatch('hide-delete-confirmation');
// }

// public function delete($id)
// {
//     $this->id = $id; // Set the id property to be used in the modal
//     $this->dispatch('show-delete-confirmation');
// }
