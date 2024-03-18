<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Department;
use App\Models\Course;

class AddIstCoursesLivewire extends Component
{
    public $courseName, $departments;

    public function render()
    {
        return view('livewire.add-ist-courses-livewire', ['Departments' => Department::where('id', '3')->get()]);
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
