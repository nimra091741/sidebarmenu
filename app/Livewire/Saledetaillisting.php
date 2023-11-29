<?php

namespace App\Livewire;
use App\Models\Saledetail;
use Livewire\Component;

class Saledetaillisting extends Component
{
    public $saledetail;
    public function mount()
    {
        $this->saledetail = Saledetail::all();
    }
    public function create()
    {
        return redirect()->to(route('createsaledetail'));
    }
    public function delete($id)
    {
        $saledetail = Saledetail::find($id)->delete();
        session()->flash('delete', 'Successfully, data deleted.');
        $this->mount();
        return redirect()->to(route('saledetaillisting'));
    }
    public function render()
    {
        return view('livewire.saledetaillisting');
    }
}
