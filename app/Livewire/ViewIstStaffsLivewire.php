<?php

namespace App\Livewire;

use App\Exports\EteStaffExport;
use App\Exports\IstStaffExport;
use App\Imports\CseStaffImport;
use App\Imports\IstStaffImport;
use Livewire\Component;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class ViewIstStaffsLivewire extends Component
{
    use WithFileUploads;

    public $IstStaffs, $staffImport;

    public function mount()
    {
        $this->IstStaffs = User::with(['instructor'])->where('role_id', '7')->get();
    }
    public function render()
    {
        return view('livewire.view-ist-staffs-livewire');
    }

    public function deleteIstStaff($id)
    {

        $deleteIstStaff = User::where("id", $id)->exists() ? User::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Ist staff deleted successfully');
    }

    public function importIstStaffs()
    {
        $this->validate(['staffImport' => 'required|mimes:xlsx,xls,csv']);

        Excel::import(new IstStaffImport, $this->staffImport);

        session()->flash('message', 'Ist staffs are imported successfully');
    }

    public function exportIstStaffs()
    {
        return Excel::download(new IstStaffExport, 'ist-staffs.csv');
        session()->flash('exportMessage' , 'Ist staffs are exported successfully.');
    }
}
