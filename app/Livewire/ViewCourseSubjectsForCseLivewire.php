<?php

namespace App\Livewire;

use App\Models\Subject;
use Livewire\Component;
use Livewire\WithPagination;
class ViewCourseSubjectsForCseLivewire extends Component
{
   use WithPagination;
   protected $paginationTheme = 'bootstrap';
    
    public function render()
    {

        return view('livewire.view-course-subjects-for-cse-livewire', ['getSubjects' => Subject::where('department_id', '2')->orWhere('department_id', '3')->orderBy('semester_id')->paginate(10)]);
    }
}
