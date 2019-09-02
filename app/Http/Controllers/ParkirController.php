<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParkirController extends Controller
{
    //
    public function parkir_masuk_view()
    {
       return view('parkir.parkir_masuk');
    }
    public function parkir_keluar_view()
    {
       return view('parkir.parkir_keluar');
    }
}
