<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comment;
use App\Models\Instructors;

class IstHodLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $instructors; 

    public function render()
    {
        $this->instructors = Instructors::where('department_id', '3')->count();
        return view('livewire.ist-hod-livewire', ['instructorComments' => Comment::where('department_id', '3')->paginate(1)]);
    }

    public function deleteHodComments($id)
    {
        $deletecomments = Comment::where("id",$id)->exists()? Comment::find($id)->delete(): false;


        session()->flash('message', 'Comment deleted successfully');
    }
}
