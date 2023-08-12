<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class ViewCseMaterialsController extends Controller
{
    public function index(){
        $materials = Document::with(['subjects'])->get();
        return view('view_cse_materials', compact('materials'));
    }

    public function deletematerials(Request $request, $id){
        $delete = Document::where('id', $id)->exists() ? Document::where('id', $id)->delete():false;

        $message = 'Document deleted successfully';
        return back()->with('documentDeleted', $message);
    }
}
