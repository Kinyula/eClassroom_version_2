<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCseCoursesLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $CseCourses;

    public function render()
    {
        $this->CseCourses = Course::with(['department'])->where('department_id', '2')->get();
        return view('livewire.view-cse-courses-livewire');
    }


    public function deleteCseCourse($id)
    {

        $deleteCseCourse = Course::where("id", $id)->exists() ? Course::find($id)->delete() : false;

        session()->flash('deleteOperation', 'Cse course is deleted successfully');
    }
}
