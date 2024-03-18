<?php

namespace App\Livewire;

use App\Models\AssignmentScore;
use Livewire\Component;
use App\Models\Result;

class ViewCseAssignmentScoresLivewire extends Component
{
    public $scores, $Total;
    public function render()
    {
        $this->scores = AssignmentScore::where('student_id', auth()->user()->student->id)->first();

        return view('livewire.view-cse-assignment-scores-livewire');
    }
}
