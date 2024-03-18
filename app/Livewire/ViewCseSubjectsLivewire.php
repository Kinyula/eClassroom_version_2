<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\CseSubjectExport;
use App\Imports\CseSubjectImport;
use Maatwebsite\Excel\Facades\Excel;

class ViewCseSubjectsLivewire extends Component
{

    use WithPagination;

    public $CseSubjects, $subjectImport;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {
        $this->CseSubjects = Subject::where('department_id', '2')->get();
        return view('livewire.view-cse-subjects-livewire');
    }

    public function deleteCseSubjects($id)
    {

        $deleteCseSubject = Subject::where("id", $id)->exists() ? Subject::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Cse subject is deleted successfully');
    }

    public function importCseSubjects()
    {
        $this->validate(['subjectImport' => 'required|mimes:xlsx,csv']);

        Excel::import(new CseSubjectImport, $this->studentImport);

        session()->flash('message', 'Subjects are imported successfully');
    }

    public function exportCseSubjects()
    {
        return Excel::download(new CseSubjectExport, 'cse-students.csv');
        session()->flash('exportMessage', 'Subjects are exported successfully');
    }
}
