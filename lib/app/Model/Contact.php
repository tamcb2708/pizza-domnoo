<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='pz-contact';
    protected $primaryKey='ct_id';
    protected $guarded=[];
}
