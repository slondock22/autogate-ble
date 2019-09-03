<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Monitoring;
use DB;


class MonitoringController extends Controller
{
    //
    public function index(Monitoring $model)
    {
        return view('monitoring.index', ['monitorings' => $model->paginate(15)]);
    }
}
