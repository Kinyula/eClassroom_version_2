<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\SubmitQuiz;
use App\Models\Instructors;

class ViewEteQuizLivewire extends Component
{
    public $answer = [], $Questions, $SubmitTo, $isCorrect;

    public function render()
    {
        $this->Questions =  Quiz::with(['optionstexts'])->where('department_id', '1')->get();

        return view('livewire.view-ete-quiz-livewire', ['submitToInstructor' => Instructors::where('department_id', '1')->get()]);
    }

    public function submitQuiz()
    {

        $this->validate(['answer' => 'required', 'SubmitTo' => 'required']);

        foreach ($this->answer as $QuestionData) {


            SubmitQuiz::create(['student_id' => auth()->user()->student->id, 'user_id' => $this->SubmitTo, 'option_id' => $QuestionData]);
        }
        session()->flash('quizSubmissionMessage', 'Quiz is submitted successfully.');
    }
}
