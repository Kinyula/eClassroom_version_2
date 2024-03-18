<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Quiz;
use App\Models\SubmitQuiz;
use App\Models\User;
use Livewire\Component;
use App\Models\Instructors;

class ViewQuizLivewire extends Component
{

    public $answer = [], $Questions, $SubmitTo, $isCorrect, $score  = 0;

    public function render()
    {
        $this->Questions =  Quiz::with(['optionstexts'])->get();



        return view('livewire.view-quiz-livewire', ['submitToInstructor' => Instructors::where('department_id', '2')->get()]);
    }

    public function submitQuiz()
    {

        $this->validate(['answer' => 'required', 'SubmitTo' => 'required']);

        foreach ($this->answer as $QuestionData) {


            SubmitQuiz::create(['student_id' => auth()->user()->student->id, 'user_id' => $this->SubmitTo, 'option_id' => $QuestionData]);
        }



        // $quizAnswer->score =  str_replace([1,2,3,4,5,6],'', $this->answer);  



        session()->flash('quizSubmissionMessage', 'Quiz is submitted successfully.');
    }
}
