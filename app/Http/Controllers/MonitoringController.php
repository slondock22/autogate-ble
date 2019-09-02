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
        // // $models = DB::table('monitorings')->get();
        // $models = Monitoring::find(1);
        // dd($model);
        return view('monitoring.index', ['monitorings' => $model->paginate(15)]);
    }
}
