<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subject;
class ViewEteSubjectsLivewire extends Component
{

    use WithPagination;
    
    public $EteSubjects;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->EteSubjects = Subject::where('department_id', '1')->get();
        return view('livewire.view-ete-subjects-livewire');
    }

    public function deleteEteSubjects($id)
    {

        $deleteCseSubject = Subject::where("id", $id)->exists() ? Subject::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Cse subject is deleted successfully');
    }
}
