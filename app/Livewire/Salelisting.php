<?php

namespace App\Livewire;

use Livewire\WithPagination;

use App\Models\Sale;
use Livewire\Component;

class Salelisting extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.salelisting', [
            'sales' => Sale::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
    public $error_message = "Deletion not done.";
    public function delete()
    {

        $sale = Sale::find($this->itemId);
        try {
            $sale->saledetails()->delete();
            $sale->profits()->delete();
            $sale->delete();
            session()->flash('delete', 'Successfully, data deleted.');
        } catch (\Exception $e) {

            $this->error_message = $e->getMessage();
        }
        $this->delete_modal = false;
        // return redirect()->to(route('salelisting'));
    }
    public $itemId, $delete_modal = false;
    public function openModal($id)
    {
        $this->delete_modal = true;
        $this->itemId = $id;
    }
    public function back()
    {
        return redirect()->to(route('salelisting'));
    }
}
