<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\DB;

class ChartController extends Controller
{
 public function lineChart(){

    $result = DB::select(DB::raw(""));
 }
}
