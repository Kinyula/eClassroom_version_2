<?php

namespace App\Livewire;

use App\Models\Instructors;
use Livewire\Component;
use App\Models\Reply;
use App\Models\Student;

class RepliesLivewire extends Component
{
    public $replyInstructor, $replyInput;
    public function render()
    {
        return view('livewire.replies-livewire', ['replyInstructors' => Instructors::get()->where('department_id', '2')]);
    }

    public function reply()
    {

        $this->validate(['replyInput' => 'required|max:255', 'replyInstructor' => 'required']);

        $InsertData = Reply::create(['instructors_id' => auth()->user()->instructor->id, 'user_id' => $this->replyInstructor, 'hod_reply' => $this->replyInput]);

        if ($InsertData) {
            $this->replyInput = '';
            $this->replyInstructor = '';
            session()->flash('addedReply', 'Reply added successfully');
        } else {
            $this->replyInput = '';
            $this->replyInstructor = '';
            session()->flash('failedReply', 'Reply failed to be added!!');
        }
    }
}
