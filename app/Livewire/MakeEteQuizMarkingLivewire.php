<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SubmitQuiz;
use App\Models\Result;
use App\Models\Student;
use Livewire\WithPagination;

class MakeEteQuizMarkingLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $SubmitTo, $answer = [];
    public function render()
    {
        return view('livewire.make-ete-quiz-marking-livewire', [
            'answers' => SubmitQuiz::with(['optionstexts', 'quiz', 'student'])->where('user_id', auth()->user()->id)->paginate(3),
            'submitToStudents' => Student::where('department_name', 'ELECTRONICS AND TELECOMMUNICATIONS ENGINEERING DEPARTMENT')->get()
        ]);
    }

    public function markQuiz()
    {

        $this->validate(['answer' => 'required', 'SubmitTo' => 'required']);

        foreach ($this->answer as $QuestionData) {


            Result::create(['instructors_id' => auth()->user()->instructor->id, 'user_id' => $this->SubmitTo, 'correct_answers' => $QuestionData]);
        }

        session()->flash('quizSubmissionMessage', 'Quiz results are submitted successfully.');
    }
}
