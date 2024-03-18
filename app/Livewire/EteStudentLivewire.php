<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Instructors;
use App\Models\ReplyToStudent;
use App\Models\Complain;
use App\Models\User;


class EteStudentLivewire extends Component
{
    use WithPagination;
    public $students;
    public $complaintInput;
    public $complaintInstructor;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $this->students = User::with(['student'])->where('id', auth()->user()->id)->first();
        return view('livewire.ete-student-livewire', [
            'complaintLecturers' => Instructors::where('department_id', '1')->get(),
            'instructorReplies' => ReplyToStudent::with(['instructor'])->where('user_id', auth()->user()->id)->paginate(5)
        ]);
    }

    public function complaints()
    {

        $this->validate(['complaintInput' => 'required|max:255', 'complaintInstructor' => 'required']);

        $InsertData = Complain::create(['student_id' => auth()->user()->student->id, 'user_id' => $this->complaintInstructor, 'student_comment' => $this->complaintInput]);

        if ($InsertData) {
            $this->complaintInput = '';
            $this->complaintInstructor = '';
            session()->flash('addedComplaint', 'Complaint added successfully');
        } else {
            $this->complaintInput = '';
            $this->complaintInstructor = '';
            session()->flash('failedComplaint', 'Complaint failed to be added!!');
        }
    }

    public function deleteInstructorReplies($id)
    {
        $deletereplies = ReplyToStudent::where("id", $id)->exists() ? ReplyToStudent::find($id)->delete() : false;

        session()->flash('deletemessage', 'Instructor reply is deleted successfully');
    }
}
