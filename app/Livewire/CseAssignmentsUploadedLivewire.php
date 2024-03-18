<?php

namespace App\Livewire;

use App\Models\Assignment;
use Livewire\Component;


class CseAssignmentsUploadedLivewire extends Component
{

    protected $paginationTheme = 'bootstrap';

    public $CseStudentSubmittedAssignment;

    public function render()
    {
        $this->CseStudentSubmittedAssignment = Assignment::with(['student', 'instructor'])->where('instructors_id', auth()->user()->instructor->id)->get();

        return view('livewire.cse-assignments-uploaded-livewire');
    }

    public function downloadAssignment($id)
    {

        $bookDocument = Assignment::where('id', $id)->first();

        $fileExtension = explode('/', $bookDocument->assignment);

        $fileExtension = strtolower(end($fileExtension));

        $file_path = public_path("storage/assignment_documents/" . $fileExtension);
        // dd($file_path);
        return response()->download($file_path);
    }

    public function deleteAssignment($id)
    {
        $deleteassignment =  Assignment::findOrFail($id);

        $file_path = public_path("storage/assignment_documents/" . $deleteassignment->assignment);

        if (file_exists($file_path)) {
            unlink($file_path);
            $deleteassignment->delete();
            session()->flash('assignmentMessage', 'Student assignment is deleted successfully');
        } else {
            session()->flash('assignmentErrorMessage', 'Student assignment failed to be deleted');
        }
    }
}
