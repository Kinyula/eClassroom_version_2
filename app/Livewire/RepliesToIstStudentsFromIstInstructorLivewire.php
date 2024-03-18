<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\ReplyToStudent;


class RepliesToIstStudentsFromIstInstructorLivewire extends Component
{
    public $replyInput, $replyStudent;
    public function render()
    {
        return view('livewire.replies-to-ist-students-from-ist-instructor-livewire', ['replyStudents' => Student::where('department_name', 'INFORMATION SYSTEMS AND TECHNOLOGY DEPARTMENT')->get()]);
    }

    public function reply()
    {

        $this->validate(['replyInput' => 'required|max:255', 'replyStudent' => 'required']);


        $replyToStudent = new ReplyToStudent();

        $replyToStudent->instructors_id = auth()->user()->instructor->id;
        $replyToStudent->user_id = $this->replyStudent;
        $replyToStudent->instructor_reply = $this->replyInput;
 
        $replyToStudent->save();

        $this->replyInput = '';
        $this->replyStudent = '';
        
        session()->flash('addedStudentReply', 'Student replied successfully');
    }
}
