<?php

namespace App\Livewire;

use App\Models\Instructors;
use App\Models\Quiz;
use App\Models\Department;
use Livewire\Component;

class MakeQuizLivewire extends Component
{
    public $QuizSentInstructor, $quiz, $questionDepartment;

    public function render()
    {
        return view('livewire.make-quiz-livewire', ['SentQuizInstructor' => Instructors::where('user_id', auth()->user()->id)->first(), 'respectiveDepartment' => Department::where('id', '2')->get()]);
    }

    public function questions(){
        $this->validate(['quiz' => 'required', 'QuizSentInstructor' => 'required', 'questionDepartment' => 'required']);

        Quiz::create(['user_id' => auth()->user()->id, 'questions' => $this->quiz]);

        session()->flash('quizmessage', 'Quiz is successfully created');

        $this->quiz = '';
        $this->QuizSentInstructor = '';
    }
}
