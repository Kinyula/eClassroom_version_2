<?php

namespace App\Livewire;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class CseDocumentsLivewire extends Component
{
    public $id, $CseDocuments;


    public function mount($id)
    {
        $this->CseDocuments =  Document::with(['subjects'])->where('department_id', '2')->where('subject_id', $id)->get();
    }
    public function render()
    {
        return view('livewire.cse-documents-livewire');
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
