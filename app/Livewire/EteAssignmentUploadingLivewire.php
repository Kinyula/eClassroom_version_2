<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Instructors;
use App\Models\Assignment;

class EteAssignmentUploadingLivewire extends Component
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

        $assignmentDocument = $this->assignmentDocument->store('assignment_documents');

        Assignment::create(['student_id' => auth()->user()->student->id, 'instructors_id' => $this->CseLecturer, 'assignment' => $assignmentDocument]);

        session()->flash('addedAssignment', 'Assignment submitted successfully');
    }

    public function render()
    {
        return view('livewire.ete-assignment-uploading-livewire', ['Lecturers' => Instructors::orderBy('first_name')->where('department_id', '1')->get()]);
    }
}
