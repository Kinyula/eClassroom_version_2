<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Instructors;
use App\Models\Assignment;

use Livewire\WithFileUploads;

class AssignmentUploadingLivewire extends Component
{
    use WithFileUploads;

    public $assignmentDocument;
    public $CseLecturer;


    public function updated($fields)
    {
        $this->validateOnly($fields, ['assignmentDocument' => 'required', 'CseLecturer' => 'required']);
    }

    public function assignments()
    {
        $this->validate(['assignmentDocument' => 'required', 'CseLecturer' => 'required']);

        $assignmentDocument = $this->assignmentDocument->store('public/assignment_documents/');

        Assignment::create(['student_id' => auth()->user()->student->id, 'instructors_id' => $this->CseLecturer, 'assignment' => $assignmentDocument]);

        session()->flash('addedAssignment', 'Assignment submitted successfully');
    }
    public function render()
    {
        return view('livewire.assignment-uploading-livewire', ['Lecturers' => Instructors::orderBy('first_name')->where('department_id', '2')->orWhere('department_id', '3')->get()]);
    }
}
