<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table='pz-agent';
    protected $primaryKey='ag_id';
    protected $guarded=[];
}
