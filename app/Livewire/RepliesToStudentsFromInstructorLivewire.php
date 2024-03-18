<?php

namespace App\Livewire;

use App\Models\ReplyToStudent;
use App\Models\Student;
use Livewire\Component;

class RepliesToStudentsFromInstructorLivewire extends Component
{
    public $replyInput, $replyStudent;

    public function render()
    {
        return view('livewire.replies-to-students-from-instructor-livewire', ['replyStudents' => Student::orderBy('first_name')->where('department_name', 'COMPUTER SCIENCE AND ENGINEERING DEPARTMENT')->get()]);
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
