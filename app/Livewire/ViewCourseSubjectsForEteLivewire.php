<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Subject;

class ViewCourseSubjectsForEteLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.view-course-subjects-for-ete-livewire', ['getSubjects' => Subject::where('department_id', '1')->orderBy('semester_id')->paginate(10)]);
    }
}
