<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class AutoController extends Controller
{
    public function listaz(){
        $autok = Auto::all();
        return view('lista',["autok" => $autok]);
    }
}
