<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Document;

class ViewEteCourseDocumentsLivewire extends Component
{
    public $id, $EteDocuments;


    public function mount($id)
    {
        $this->EteDocuments =  Document::with(['subjects'])->where('department_id', '1')->where('subject_id', $id)->get();
    }
    public function render()
    {
        return view('livewire.view-ete-course-documents-livewire');
    }

    public function downloadMaterials($id)
    {

        $bookDocument = Document::where('id', $id)->first();


        $fileExtension = explode('/', $bookDocument->file_name);

        $fileExtension = strtolower(end($fileExtension));

        $file_path = public_path("storage/my_web_documents/" . $fileExtension);



        return response()->download($file_path);
    }
}
