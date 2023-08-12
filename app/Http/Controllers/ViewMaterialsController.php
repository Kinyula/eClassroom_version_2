<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class ViewMaterialsController extends Controller
{
    public function index(){
        $materials = Document::where('department_id', '1')->get();
        return view('view_materials', compact('materials'));
    }

    public function deletematerials(Request $request, $id){
        $delete = Document::where('id', $id)->exists() ? Document::where('id', $id)->delete():false;

        $message = 'Document deleted successfully';
        return back()->with('documentDeleted', $message);
    }
}
