<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Exports\CseStaffExport;
use App\Imports\CseStaffImport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class ViewCseStaffsLivewire extends Component
{
    use WithFileUploads;

    public $CseStaffs, $staffImport;

    public function mount()
    {
        $this->CseStaffs = User::with(['instructor'])->where('role_id', '6')->get();
    }

    public function render()
    {
        return view('livewire.view-cse-staffs-livewire');
    }

    public function deleteCseStaff($id)
    {

        $deleteCseStaff = User::where("id", $id)->exists() ? User::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Cse staff deleted successfully');
    }

    public function importCseStaffs()
    {
        $this->validate(['staffImport' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new CseStaffImport, $this->staffImport);

        session()->flash('message', 'Cse staffs are imported successfully');
    }

    public function exportCseStaffs()
    {
        return Excel::download(new CseStaffExport, 'cse-staffs.csv');
        session()->flash('exportMessage', 'Cse staffs are exported successfully.');
    }
}
