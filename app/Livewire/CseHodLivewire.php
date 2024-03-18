<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

use App\Models\Instructors;

use Livewire\WithPagination;

class CseHodLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $instructors;

    public function render()
    {
        $this->instructors = Instructors::where('department_id', '2')->count();

        return view('livewire.cse-hod-livewire', ['instructorComments' => Comment::where('department_id', '2')->paginate(1)]);
    }

    public function deleteHodComments($id)
    {
        $deletecomments = Comment::where("id",$id)->exists()? Comment::find($id): false;





        session()->flash('message', 'Comment deleted successfully');
    }
}
