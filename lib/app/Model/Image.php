<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='pz-image';
    protected $primaryKey='im_id';
    protected $guarded=[];
}
