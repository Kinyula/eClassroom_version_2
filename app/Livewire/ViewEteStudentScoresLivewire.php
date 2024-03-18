<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Result;
use App\Models\Quiz;

class ViewEteStudentScoresLivewire extends Component
{
    public $scores, $Total;

    public function render()
    {
        $this->scores = Result::where('user_id', auth()->user()->id)->whereNotNull('correct_answers')->count();
        $this->Total = Quiz::count();
        
        return view('livewire.view-ete-student-scores-livewire');
    }
}
