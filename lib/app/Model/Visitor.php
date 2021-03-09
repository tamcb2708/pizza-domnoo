<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table='pz-visitors';
    protected $primaryKey='id_visitors';
    protected $guarded=[];
}
