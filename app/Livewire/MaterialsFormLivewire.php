<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Document;
use App\Models\Instructors;
use App\Models\Subject;
use App\Models\Year;
use App\Models\Semester;
use App\Models\Department;
use App\Models\Comment;

class MaterialsFormLivewire extends Component
{
    use WithFileUploads;

    public $instructors, $Semesters, $years, $departments, $file, $Subject, $Semester;
    public $Subjects = [];

    public function render()
    {

        $this->Semesters = Semester::get();

        return view('livewire.materials-form-livewire', ['Years' => Year::get(), 'Departments' => Department::where('id', '2')->get(), 'Subjects' => Subject::get()]);
    }

    public function changeSemester()
    {
        if ($this->Semester !== "") {
            $this->Subjects = Subject::where('semester_id', $this->Semester)->where('department_id', '2')->orderBy('subject_name')->get();
        }
    }


    public function materials()
    {

        $this->validate([
            'Semester' => 'required',
            'file' => 'required|mimes:pdf,pptx',
            'Subject' => 'required',
            'years' => 'required',
            'departments' => 'required'
        ]);

        $document = new Document();

        $document->instructors_id = auth()->user()->instructor->id;
        $document->department_id = $this->departments;
        $document->year_id = $this->years;
        $document->subject_id = $this->Subject;
        $document->semester_id = $this->Semester;

        $documentpath = $this->file->store('public/my_web_documents');

        $document->file_name = $documentpath;
        $document->save();

        session()->flash('message', 'Document successfully added.');


        $this->file = "";
        $this->Semester = "";
        $this->Subject = "";
        $this->years = "";
        $this->departments = "";
    }
}
