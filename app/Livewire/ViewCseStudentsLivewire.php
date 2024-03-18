<?php

namespace App\Livewire;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;


class ViewCseStudentsLivewire extends Component
{
    use WithFileUploads;



    public $CseStudents, $studentImport;

    public function mount()
    {
        $this->CseStudents = Student::with(['user'])->where('department_name', 'COMPUTER SCIENCE AND ENGINEERING DEPARTMENT')->get();
    }

    public function render()
    {

        return view('livewire.view-cse-students-livewire');
    }

    public function deleteCseStudent($id)
    {

        $deleteCseStudent = Student::where("id", $id)->exists() ? Student::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Cse student deleted successfully');
    }

    public function importCseStudents()
    {
        $this->validate(['studentImport' => 'required|mimes:xlsx,csv']);

        Excel::import(new StudentImport, $this->studentImport);

        session()->flash('message', 'students are imported successfully');
    }

    public function exportCseStudents()
    {
        return Excel::download(new StudentExport, 'cse-students.csv');
        session()->flash('exportMessage', 'Cse students are exported successfully.');
    }
}
