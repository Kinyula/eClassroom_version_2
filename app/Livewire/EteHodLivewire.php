<?php

namespace App\Livewire;
use App\Models\Comment;

use App\Models\Instructors;

use Livewire\WithPagination;
use Livewire\Component;

class EteHodLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $instructors; 
    
    public function render()
    {
        $this->instructors = Instructors::where('department_id', '1')->count();
        return view('livewire.ete-hod-livewire',  ['instructorComments' => Comment::with(['instructor'])->where('department_id', '1')->paginate(1)]);
    }

    public function deleteHodComments($id)
    {
        $deletecomments = Comment::where("id",$id)->exists()? Comment::find($id)->delete(): false;

        session()->flash('message', 'Comment is deleted successfully');
    }
}
