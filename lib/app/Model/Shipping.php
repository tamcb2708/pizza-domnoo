<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $table='pz-shipping';
    protected $primaryKey='ship_id';
    protected $guarded=[];
}
