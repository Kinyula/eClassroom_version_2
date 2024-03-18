<?php

namespace App\Livewire;

use App\Models\AssignmentScore;
use App\Models\Student;
use Livewire\Component;


class CseAssignmentMarkingLivewire extends Component
{
    public $AssignmentScores, $TotalQuestionsAvailable, $Students;

    public function render()
    {
        return view('livewire.cse-assignment-marking-livewire', ['CseStudents' => Student::orderBy('first_name')->where('department_name', 'COMPUTER SCIENCE AND ENGINEERING DEPARTMENT')->get()]);
    }

    public function setScore()
    {
        $this->validate(['AssignmentScores' => 'required|digits_between:0,100', 'TotalQuestionsAvailable' => 'required|digits_between:0,100', 'Students' => 'required']);

        AssignmentScore::create([
            'instructors_id' => auth()->user()->instructor->id,
            'student_id' => $this->Students,
            'scores' => $this->AssignmentScores,
            'total_number_of_questions' => $this->TotalQuestionsAvailable
        ]);

        session()->flash('assignmentMarkingMessage', 'Assignment marked successfully.');
        $this->AssignmentScores = '';
        $this->TotalQuestionsAvailable = '';
        $this->Students = '';
    }
}
