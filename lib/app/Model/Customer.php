<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='pz-customer';
    protected $primaryKey='cus_id';
    protected $guarded=[];
}
