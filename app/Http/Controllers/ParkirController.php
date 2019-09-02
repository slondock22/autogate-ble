<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GatesBleEvent;
use App\Monitoring;
use App\Truk;
use Illuminate\Support\Facades\Validator;



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

    public function gates_ble(Request $request)
    {
      $uuid        = $request->uuid;
      $major       = $request->major;
      $minor       = $request->minor;
      $type        = $request->type;

      event(new GatesBleEvent($uuid, $major, $minor, $type));
      return response()->json('success',200);  
    }

    public function check_parking(Request $request)
    {
         $validator = Validator::make($request->all(),[
            'uuid'      => 'required|uuid',
            'major'     => 'required|max:4',
            'minor' => 'required|max:4',

            ]);

            if ($validator->fails())
            {
                  return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
            }

         $truk = Truk::select('id')->where([
                  ['uuid',$request->uuid],
                  ['major',$request->major],
                  ['minor',$request->minor],
         ])->first();

        if($truk){
            $check = Monitoring::select('is_parking')->where([
               ['id_truck',$truk->id],
               ['gate_out',NULL],
               ['is_parking', '1']
            ])->first();

            if($check){
               $data = $check;
               $code = 200;
            }else{
               $data = "Truk Sudah Keluar";
               $code = 200;
            }
        }else{
           $data = "Truk Tidak Terdaftar";
           $code = 500;
        }
         
        return response()->json($data,$code);

    }

    
}
