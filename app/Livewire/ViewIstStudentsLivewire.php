<?php

namespace App\Livewire;

use App\Exports\IstStudentExport;
use App\Imports\StudentImport;
use Livewire\Component;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class ViewIstStudentsLivewire extends Component
{
    use WithFileUploads;

    public $IstStudents, $studentImport;

    public function mount()
    {
        $this->IstStudents = Student::with(['user'])->where('department_name', 'INFORMATION SYSTEMS AND TECHNOLOGY DEPARTMENT')->get();
    }

    public function render()
    {
        return view('livewire.view-ist-students-livewire');
    }

    public function importIstStudents()
    {
        $this->validate(['studentImport' => 'required|mimes:xlsx,csv']);

        Excel::import(new StudentImport, $this->studentImport);

        session()->flash('message', 'students are imported successfully');
    }

    public function exportIstStudents()
    {
        return Excel::download(new IstStudentExport, 'ist-students.csv');
        session()->flash('exportMessage', 'Students are exported successfully');
    }

    public function deleteIstStudent($id)
    {


        $deleteIstStudent = Student::where("id", $id)->exists() ? Student::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Ist student deleted successfully');
    }
}
