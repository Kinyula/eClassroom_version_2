<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Document;
use App\Models\Semester;
use App\Models\Subject;
use App\Models\Year;
use Livewire\Component;
use Livewire\WithFileUploads;

class EteMaterialsFormLivewire extends Component
{
    use WithFileUploads;

    public $instructors, $Semesters, $years, $departments, $file, $Subject, $Semester;
    public $Subjects = [];

    public function render()
    {
        $this->Semesters = Semester::get();
        return view('livewire.ete-materials-form-livewire', ['Years' => Year::get(), 'Departments' => Department::where('id', '1')->get()]);
    }

    public function changeSemester()
    {
        if ($this->Semester !== "") {
            $this->Subjects = Subject::where('semester_id', $this->Semester)->where('department_id', '1')->get();
        }
    }

    public function materials()
    {

        $this->validate([
            'Semester' => 'required',
            'file' => 'required|mimes:pdf, pptx',
            'Subject' => 'required',
            'years' => 'required',
            'departments' => 'required'
        ]);

        $document = new Document();
        $documentpath = $this->file->store('my_web_documents');

        $document->file_name = $documentpath;
        $document->instructors_id = auth()->user()->instructors_id;
        $document->department_id = $this->departments;
        $document->year_id = $this->years;
        $document->subject_id = $this->Subject;
        $document->semester_id = $this->Semester;




        $document->save();

        session()->flash('message', 'Document successfully added.');


        $this->file = "";
        $this->Semester = "";
        $this->Subject = "";
        $this->years = "";
        $this->departments = "";
    }
}
