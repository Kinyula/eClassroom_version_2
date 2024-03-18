<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Option;
use App\Models\Quiz;

class MakeEteQuizAnswerOptionsLivewire extends Component
{
    public $QuizText, $QuestionText, $correctValue;
    public function render()
    {
        return view('livewire.make-ete-quiz-answer-options-livewire', ['Quizzes' => Quiz::with(['optionstexts'])->where('department_id', '1')->get()]);
    }

    public function options()
    {
        $this->validate(['QuizText' => 'required', 'QuestionText' => 'required', 'correctValue' => 'required']);

        Option::create(['quiz_id' => $this->QuestionText, 'options' => $this->QuizText, 'is_correct' => $this->correctValue]);

        session()->flash('quizoptionmessage', 'Option is successfully created');

        $this->QuizText = '';
        $this->QuestionText = '';
    }
}
