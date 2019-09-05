<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Truk;
use App\Monitoring;
use Auth;
use DateTime;
use App\Logging;

class GatesBleEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $uuid;
    public $major;
    public $minor;
    public $type;
    public $data;



    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($uuid, $major, $minor, $type)
    {
        //
        $this->uuid     = $uuid;
        $this->major    = $major;
        $this->minor    = $minor;
        $this->type     = $type;
        $this->data = $this->getData($uuid, $major, $minor, $type);
     

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['blereceiver'];
    }

    public function broadcastAs()
    {
        return 'BleEvent';
    }

    public function getData($uuid, $major, $minor, $type)
    {
        $truk = Truk::where([
            ['uuid', $uuid],
            ['major', $major],
            ['minor', $minor]
        ])->first();

        // dd($truk);

        if($truk){
            $authorize = $truk->is_auth;
        }else{
            $authorize = ['is_auth' => 3];
        }

        if($type == 'masuk'){
           
            if($authorize == 1){

                $is_parking = Monitoring::where('id_truck',$truk->id)
                                        ->where('is_parking', 1)
                                        ->first();
                if($is_parking == "" || $is_parking == NULL ){
                    $masuk = new Monitoring;
                    $masuk->id_truck = $truk->id;
                    $masuk->gate_in = date('Y-m-d H:i:s');
                    $masuk->is_parking = 1;
    
                    $masuk->save();
    
                    if($masuk){
                        $log = new Logging;
                        $log->no_polisi = $truk->no_polisi;
                        $log->no_tid    = $truk->no_tid;
                        $log->uuid      = $uuid;
                        $log->major     = $major;
                        $log->minor     = $minor;
                        $log->gate_in   = date('Y-m-d H:i:s');
                        $log->is_auth   = $authorize;
                        $log->save();

                        $data = [
                            'tgl_masuk' => date('Y-m-d'),
                            'jam_masuk' => date('H:i:s'),
                            'no_polisi' => $truk->no_polisi,
                            // 'nama_supir' => $truk->nama_supir,
                            'no_tid' => $truk->no_tid,
                            'image_profile' => $truk->image_profile,
                            'nama_perusahaan' => $truk->nama_perusahaan,
                            'bidang_perusahaan' => $truk->bidang_perusahaan,
                            'notif' => 'alert-success',
                            'notif_text' => 'Gate Berhasil Di Buka',
                        ];
                    }
                }else{
                    $data = [
                        'tgl_masuk' => date('Y-m-d'),
                        'jam_masuk' => date('H:i:s'),
                        'no_polisi' => $truk->no_polisi,
                        // 'nama_supir' => $truk->nama_supir,
                        'no_tid' => $truk->no_tid,
                        'image_profile' => $truk->image_profile,
                        'nama_perusahaan' => $truk->nama_perusahaan,
                        'bidang_perusahaan' => $truk->bidang_perusahaan,
                        'notif' => 'alert-success',
                        'notif_text' => 'Silahkan Masuk',
                    ];
                }                       
               
            }elseif($authorize == 0){
                    $log = new Logging;
                    $log->no_polisi = $truk->no_polisi;
                    $log->no_tid    = $truk->no_tid;
                    $log->uuid      = $uuid;
                    $log->major     = $major;
                    $log->minor     = $minor;
                    $log->gate_in   = date('Y-m-d H:i:s');
                    $log->is_auth   = $authorize;
                    $log->save();

                    $data = [
                        'tgl_masuk' => date('Y-m-d'),
                        'jam_masuk' => date('H:i:s'),
                        'no_polisi' => $truk->no_polisi,
                        // 'nama_supir' => $truk->nama_supir,
                        'no_tid' => $truk->no_tid,
                        'image_profile' => $truk->image_profile,
                        'nama_perusahaan' => $truk->nama_perusahaan,
                        'bidang_perusahaan' => $truk->bidang_perusahaan,
                        'notif' => 'alert-danger',
                        'notif_text' => 'Tidak Ada Akses Masuk',
                    ];
            }else{
                    $log = new Logging;
                    $log->uuid      = $uuid;
                    $log->major     = $major;
                    $log->minor     = $minor;
                    $log->gate_in   = date('Y-m-d H:i:s');
                    $log->is_auth   = $authorize['is_auth'];
                    $log->save();

                $data = [
                    'tgl_masuk' => date('Y-m-d'),
                    'jam_masuk' => date('H:i:s'),
                    'image_profile' => '',
                    'notif' => 'alert-danger',
                    'notif_text' => 'Kendaraan Anda Tidak Terdaftar',
                ];
            }

            return $data;
        }

        elseif($type == 'keluar'){
            
            $keluar = Monitoring::where('id_truck',$truk->id)
                                ->where('gate_out',NULL)
                                ->where('is_parking',1)
                                ->first();


            $gate_in = new DateTime($keluar->gate_in);
            $now     = new DateTime();
            $selisih_jam = $gate_in->diff($now)->format("%h");
            if($selisih_jam < 1){
                $selisih_jam = 1;
            }
            $biaya = $selisih_jam * 4000;

            $keluar->gate_out = date('Y-m-d H:i:s');
            $keluar->is_parking = 0;
            $keluar->hours = $selisih_jam;
            $keluar->price = $biaya;
            $keluar->save();

            if($keluar){
                    $log = new Logging;
                    $log->no_polisi = $truk->no_polisi;
                    $log->no_tid    = $truk->no_tid;
                    $log->uuid      = $uuid;
                    $log->major     = $major;
                    $log->minor     = $minor;
                    $log->gate_out   = date('Y-m-d H:i:s');
                    $log->is_auth   = $authorize;
                    $log->save();

                    $data = [
                        'tgl_masuk' => date('Y-m-d', strtotime($keluar->gate_in)),
                        'jam_masuk' => date('H:i:s',strtotime($keluar->gate_in)),
                        'tgl_keluar' => date('Y-m-d'),
                        'jam_keluar' => date('H:i:s'),
                        'selisih_jam' => $selisih_jam,
                        'total_biaya' => $biaya,
                        'no_polisi' => $truk->no_polisi,
                        // 'nama_supir' => $truk->nama_supir,
                        'no_tid' => $truk->no_tid,
                        'image_profile' => $truk->image_profile,
                        'nama_perusahaan' => $truk->nama_perusahaan,
                        'bidang_perusahaan' => $truk->bidang_perusahaan,
                        'notif' => 'alert-success',
                        'notif_text' => 'Gate Berhasil Di Buka',
                    ];
            }

            return $data;

        }

        return $data;
    }
}
