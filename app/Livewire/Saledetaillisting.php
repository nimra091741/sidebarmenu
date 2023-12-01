<?php

namespace App\Livewire;use Livewire\WithPagination;

use App\Models\Saledetail;
use Livewire\Component;

class Saledetaillisting extends Component
{
      use WithPagination;
    public function render()
    {
        $saledetail = Saledetail::orderBy('created_at', 'desc')->get();
        return view('livewire.saledetaillisting',[
            'saledetail' => Saledetail::paginate(12),
        ]);
    }
    public function mount()
    {
        $saledetail = Saledetail::orderBy('created_at', 'desc')->get();
    }
    public function create()
    {
        return redirect()->to(route('createsaledetail'));
    }
    public function read($id)
    {
        return redirect()->to(route('readsaledetail',['id' ,$id]) );
    }
    public function update($id)
    {
        return redirect()->to(route('updatesaledetail',['id' ,$id]) );
    }
    public function delete($id)
    {
        $saledetail = Saledetail::find($id)->delete();
        session()->flash('delete', 'Successfully, data deleted.');
        $this->mount();
        return redirect()->to(route('saledetaillisting'));
    }
}
