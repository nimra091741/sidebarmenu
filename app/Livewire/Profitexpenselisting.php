<?php


namespace App\Livewire; use Livewire\WithPagination;
use App\Models\ProfitAndExpense;
use Livewire\Component;

class Profitexpenselisting extends Component
{
  use WithPagination;
public function render()
    {
        return view('livewire.profitexpenselisting',[
            'profit' => ProfitAndExpense::paginate(12),
        ]);
    }
    public function mount()
    {
        $profit = ProfitAndExpense::orderBy('created_at', 'desc')->get();
    }
    public function create()
    {
        return redirect()->to(route('createprofitexpense'));
    }
    public function read($id)
    {
        return redirect()->to(route('readprofitexpense',['id' ,$id]) );
    }
    public function update($id)
    {
        return redirect()->to(route('updateprofitexpense',['id' ,$id]) );
    }
    public function delete($id)
    {
        $product = ProfitAndExpense::find($id)->delete();
        session()->flash('delete', 'Successfully, data deleted.');
        $this->mount();
        return redirect()->to(route('profitexpenselisting'));
    }

}
