<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Department;
use Livewire\Component;

class CoursesLivewire extends Component
{
    public $courseName, $departments;
    public function render()
    {

        return view('livewire.courses-livewire', ['Departments' => Department::where('id', '2')->get()]);
    }

    public function courses()
    {

        $this->validate([

            'courseName' => 'required',
            'departments' => 'required'
        ]);

        $subject = new Course();

        $subject->department_id = $this->departments;
        $subject->course_name = $this->courseName;



        // $documentpath = $this->file->store('my_web_documents');

        // $document->file_name = $documentpath;
        $subject->save();

        session()->flash('message', 'The Course is successfully added.');


        $this->courseName = "";

        $this->departments = "";
    }
}
