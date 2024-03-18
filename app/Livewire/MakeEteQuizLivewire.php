<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Instructors;
use App\Models\Quiz;
use Livewire\Component;

class MakeEteQuizLivewire extends Component
{
    public $QuizSentInstructor, $quiz, $questionDepartment;
    public function render()
    {
        return view('livewire.make-ete-quiz-livewire', ['SentQuizInstructor' => Instructors::where('user_id', auth()->user()->id)->first(), 'respectiveDepartment' => Department::where('id', '1')->get()]);
    }


    public function questions()
    {
        $this->validate(['quiz' => 'required', 'QuizSentInstructor' => 'required', 'questionDepartment' => 'required']);

        Quiz::create(['user_id' => auth()->user()->id, 'questions' => $this->quiz, 'department_id' => $this->questionDepartment]);

        session()->flash('quizmessage', 'Quiz is successfully created');

        $this->quiz = '';
        $this->QuizSentInstructor = '';
    }
}
