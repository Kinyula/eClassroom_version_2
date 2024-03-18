<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Quiz;
use Livewire\Component;

class MakeQuizOptionsLivewire extends Component
{
    public $QuizText, $QuestionText, $correctValue;
    public function render()
    {
        return view('livewire.make-quiz-options-livewire', ['Quizzes' => Quiz::with(['optionstexts'])->get()]);
    }

    public function options(){
        $this->validate(['QuizText' => 'required', 'QuestionText' => 'required', 'correctValue' => 'required']);

        Option::create(['quiz_id' => $this->QuestionText, 'options' => $this->QuizText, 'is_correct' => $this->correctValue]);

        session()->flash('quizoptionmessage', 'Option is successfully created');

        $this->QuizText = '';
        $this->QuestionText = '';
    }
}
