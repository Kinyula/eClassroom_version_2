<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Instructors;
use App\Models\Department;

class MakeIstQuizQuestionsLivewire extends Component
{
    public $quiz, $QuizSentInstructor;

    public function render()
    {
        return view('livewire.make-ist-quiz-questions-livewire' , ['SentQuizInstructor' => Instructors::where('user_id', auth()->user()->id)->first(), 'respectiveDepartment' => Department::where('id', '3')->get()]);
    }

    public function questions()
    {
        $this->validate(['quiz' => 'required', 'QuizSentInstructor' => 'required', 'questionDepartment' => 'required']);

        Quiz::create(['user_id' => auth()->user()->id, 'questions' => $this->quiz]);

        session()->flash('quizmessage', 'Quiz is successfully created');

        $this->quiz = '';
        $this->QuizSentInstructor = '';
    }
}
