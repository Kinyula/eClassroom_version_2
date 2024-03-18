<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ReplyToStudent;
use App\Models\Student;

class RepliesToEteStudentsLivewire extends Component
{
    public $replyInput, $replyStudent;

    public function render()
    {
        return view('livewire.replies-to-ete-students-livewire', ['replyStudents' => Student::where('department_name', 'ELECTRONICS AND TELECOMMUNICATIONS ENGINEERING DEPARTMENT')->get()]);
    }

    public function reply()
    {

        $this->validate(['replyInput' => 'required|max:255', 'replyStudent' => 'required']);


        $replyToStudent = new ReplyToStudent();

        $replyToStudent->instructors_id = auth()->user()->instructor->id;
        $replyToStudent->user_id = $this->replyStudent;
        $replyToStudent->instructor_reply = $this->replyInput;
 
        $replyToStudent->save();

        session()->flash('addedStudentReply', 'Student replied successfully');
    }
}
