<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $table = 'monitorings';

    public function truk()
    {
        return $this->belongsTo('App\Truk','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
