<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    protected $table = 'loggings';

    protected $fillable = ['no_polisi','no_tid','uuid','major','minor','gate_in','gate_out','is_auth'];
}
