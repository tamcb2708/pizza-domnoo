<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table='pz-coupon';
    protected $primaryKey='con_id';
    protected $guarded=[];
}
