<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table='pz-history';
    protected $primaryKey='hi_id';
    protected $guarded=[];
}
