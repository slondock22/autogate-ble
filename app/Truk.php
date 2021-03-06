<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truk extends Model
{
    protected $table = 'trucks';

    protected $fillable = [
        'no_polisi', 'nama_supir', 'nama_perusahaan', 'bidang_perusahaan', 'uuid', 'major', 'minor', 'is_auth', 'no_tid', 'cctv_depan','cctv_belakang','image_profile'
    ];

    public function monitoring()
    {
        return $this->hasMany('App\Monitoring', 'id_truck','id');
    }
    
}
