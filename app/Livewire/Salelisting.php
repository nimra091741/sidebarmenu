<?php

namespace App\Livewire;use Livewire\WithPagination;

use App\Models\Sale;
use Livewire\Component;

class Salelisting extends Component
{
      use WithPagination;
    public function render()
    {
        return view('livewire.salelisting',[
            'sales' => Sale::orderBy('created_at', 'desc')->paginate(12),
        ]);
    }
    // public function mount()
    // {
    //     $sales = Sale::orderBy('created_at', 'desc')->get();
    // }
    public function create()
    {
        return redirect()->to(route('createsale'));
    }
    public function read($id)
    {
        return redirect()->to(route('readsales',['id' ,$id]) );
    }
    public function update($id)
    {
        return redirect()->to(route('updatesales',['id' ,$id]) );
    }
    public function delete($id)
    {
        $sales = Sale::find($id)->delete();
        session()->flash('delete', 'Successfully, data deleted.');
        $this->mount();
        return redirect()->to(route('salelisting'));
    }

}
