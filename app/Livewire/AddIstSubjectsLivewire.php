<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semester;
use App\Models\Department;
use App\Models\Subject;

class AddIstSubjectsLivewire extends Component
{

    public $departments, $subjectName, $subjectCode, $Semester;
    public function render()
    {
        return view('livewire.add-ist-subjects-livewire', ['Semesters' => Semester::get(), 'Departments' => Department::where('id', '3')->get()]);
    }

    public function subjects()
    {

        $this->validate([
            'Semester' => 'required',
            'subjectName' => 'required',
            'subjectCode' => 'required',
            'departments' => 'required'
        ]);

        $subject = new Subject();

        $subject->semester_id = $this->Semester;
        $subject->department_id = $this->departments;
        $subject->subject_name = $this->subjectName;
        $subject->subject_course_code = $this->subjectCode;


        // $documentpath = $this->file->store('my_web_documents');

        // $document->file_name = $documentpath;
        $subject->save();

        session()->flash('message', 'The subject successfully added.');


        $this->subjectName = "";
        $this->Semester = "";
        $this->subjectCode = "";
        $this->departments = "";
    }
}
