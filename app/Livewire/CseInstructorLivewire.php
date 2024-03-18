<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Comment;
use App\Models\Complain;
use App\Models\User;
use Livewire\WithFileUploads;
use App\Models\Document;
use App\Models\Instructors;
use App\Models\Subject;
use App\Models\Year;
use App\Models\Semester;
use App\Models\Department;
use App\Models\Reply;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class CseInstructorLivewire extends Component
{

    use WithPagination;

    public $instructors;

    public $commentInput, $departmentId;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $this->instructors = Instructors::where('user_id', auth()->user()->id)->first();

        return view(
            'livewire.cse-instructor-livewire',
            [
                'studentComplaints' => Complain::with(['student', 'user'])->latest()->where('user_id', '=', auth()->user()->id)->paginate(5),
                'hodReplies' => Reply::with(['instructor'])->where('user_id', auth()->user()->id)->paginate(5),
                'departments' => Department::where('id', '2')->get()

            ]

        );
    }

    public function comments()
    {

        $this->validate(['commentInput' => 'required|max:255', 'departmentId' => 'required']);

        $comments = new Comment();
        $comments->instructors_id = auth()->user()->instructor->id;
        $comments->instructor_comment = $this->commentInput;
        $comments->department_id = $this->departmentId;


        $comments->save();

        $this->commentInput = '';
        $this->departmentId = '';

        session()->flash('addedComment', 'Comment added successfully');
    }

    public function resetInputs()
    {

        $this->reset(['Semester', 'Subject', 'year', 'department', 'file']);
    }

    public function deleteHodReplies($id)
    {
        $deletereplies = Reply::where("id", $id)->exists() ? Reply::find($id)->delete() : false;

        session()->flash('message', 'Hod reply is deleted successfully');
    }

    public function deleteCseStudentComplaint($id){
        $deletereplies = Complain::where("id", $id)->exists() ? Complain::find($id)->delete() : false;

        session()->flash('complaintMessage', 'Student complaint is deleted successfully');
    }
}
