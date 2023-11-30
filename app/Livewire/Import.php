<?php

namespace App\Livewire;

use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
// use App\Imports\YourCsvImport;

use Livewire\Component;

class Import extends Component
{
    use WithFileUploads;

    public $file;
    public function importView()
    {
        return view('livewire.import-csv');
    }
    public function import()
    {
        $this->validate([
            'file' => 'required|mimes:csv,txt,xlsx|max:10240',
        ]);

        try {
            Excel::import(new Import, $this->file);

            session()->flash('message', 'CSV imported successfully.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error importing CSV: ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.import');
    }
}
