<?php

namespace App\Livewire;

use App\Exports\EteStaffExport;
use App\Imports\CseStaffImport;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ViewEteStaffsLivewire extends Component
{
    use WithFileUploads;
    public $EteStaffs, $staffImport;

    public function mount()
    {
        $this->EteStaffs = User::with(['instructor'])->where('role_id', '5')->get();
    }
    public function render()
    {
        return view('livewire.view-ete-staffs-livewire');
    }

    public function deleteEteStaff($id)
    {

        $deleteEteStaff = User::where("id", $id)->exists() ? User::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Ete staff is deleted successfully');
    }

    public function importEteStaffs()
    {
        $this->validate(['staffImport' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new CseStaffImport, $this->staffImport);

        session()->flash('message', 'Ete staffs are imported successfully');
    }

    public function exportEteStaffs()
    {
        return Excel::download(new EteStaffExport, 'ete-staffs.csv');
        session()->flash('exportMessage' , 'Ete staffs are exported successfully.');
    }
}
