<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCseMaterialsLivewire extends Component
{
    use WithPagination;

    public $CseDocuments;


    public function mount()
    {
        $this->CseDocuments = Document::with(['year', 'department', 'subjects', 'semester', 'instructor'])->where('department_id', '2')->get();
    }

    public function render()
    {
        return view('livewire.view-cse-materials-livewire');
    }

    public function deleteCseDocuments($id)
    {


        $deleteCseDocument = Document::findOrFail($id);

        $file_path = public_path("storage/my_web_documents/" . $deleteCseDocument->file_name);

        if (file_exists($file_path)) {

            unlink($file_path);

            $deleteCseDocument->delete();

            session()->flash('deleteOperation', 'Cse document deleted successfully');
        }

        else{
            session()->flash('deleteErrorOperation', 'Cse document failed to be deleted');
        }
    }
}
