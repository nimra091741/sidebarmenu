<?php

namespace App\Livewire;
use App\Models\Sale;
use Livewire\Component;

class Salelisting extends Component
{
    public $sales;
    public function mount()
    {
        $this->sales = Sale::all();
    }
    public function create()
    {
        return redirect()->to(route('createsale'));
    }
    public function delete($id)
    {
        $sales = Sale::find($id)->delete();
        session()->flash('delete', 'Successfully, data deleted.');
        $this->mount();
        return redirect()->to(route('salelisting'));
    }
    public function render()
    {
        return view('livewire.salelisting');
    }
}
