<?php

namespace App\Livewire;

use App\Models\Instructors;
use App\Models\Reply;

use Livewire\Component;

class RepliesToEteInstructorsLivewire extends Component
{
    public $replyInput, $replyInstructor;
    public function render()
    {
 
        return view('livewire.replies-to-ete-instructors-livewire', ['replyInstructors' => Instructors::where('department_id', 1)->get()]);
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
