<?php

namespace App\Livewire;

use App\Exports\EteStudentExport;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Livewire\Component;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;

class ViewEteStudentsLivewire extends Component
{
    use WithFileUploads;

    public $EteStudents, $studentImport;

    public function render()
    {
        $this->EteStudents = Student::where('department_name', 'ELECTRONICS AND TELECOMMUNICATIONS ENGINEERING DEPARTMENT')->get();
        return view('livewire.view-ete-students-livewire');
    }

    public function importEteStudents()
    {
        $this->validate(['studentImport' => 'required|mimes:xlsx,csv']);

        Excel::import(new StudentImport, $this->studentImport);

        session()->flash('message', 'students are imported successfully');
    }

    public function exportEteStudents()
    {
        return Excel::download(new EteStudentExport, 'ete-students.csv');
        session()->flash('exportMessage', 'Ete students are exported successfully.');
    }
    public function deleteEteStudent($id)
    {

        $deleteEteStudent = Student::where("id", $id)->exists() ? Student::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Ete student deleted successfully');
    }
}
