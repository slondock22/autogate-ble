<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logging;

class LoggingController extends Controller
{
    public function index(Logging $model)
    {
        return view('logging.index', ['loggings' => $model->paginate(15)]);        # code...
    }
}
 