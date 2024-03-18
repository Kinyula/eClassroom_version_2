<?php

namespace App\Livewire;

use App\Models\Quiz;
use App\Models\Result;
use Livewire\Component;

class ViewStudentScoresLivewire extends Component
{
    public $scores, $Total;

    public function render()
    {

        $this->scores = Result::where('user_id', auth()->user()->id)->whereNotNull('correct_answers')->count();

        $this->Total = Quiz::count();
        return view('livewire.view-student-scores-livewire');
    }
}
