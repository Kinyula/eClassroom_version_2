<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Instructors;
use App\Models\Complain;
use App\Models\Reply;
use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;
class EteInstructorLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $instructors;

    public $commentInput, $departmentId;

    public function render()
    {

        $this->instructors = Instructors::where('user_id', auth()->user()->id)->first();
        return view('livewire.ete-instructor-livewire', [
            'studentComplaints' => Complain::with(['student', 'user'])->latest()->where('user_id', '=', auth()->user()->id)->paginate(5),
            'hodReplies' => Reply::with(['instructor'])->where('user_id', auth()->user()->id)->paginate(5),
            'departments' => Department::where('id', '1')->get()
        ]);
    }

    public function comments()
    {

        $this->validate(['commentInput' => 'required|max:255']);
        $comments = new Comment();
        $comments->instructors_id = auth()->user()->instructor->id;
        $comments->instructor_comment = $this->commentInput;
        $comments->department_id = $this->departmentId;
        $comments->save();

        $this->commentInput = '';
        session()->flash('addedComment', 'Comment added successfully');
    }



    public function resetInputs()
    {

        $this->reset(['Semester', 'Subject', 'year', 'department', 'file']);
    }
}
