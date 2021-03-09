<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='pz-blog';
    protected $primaryKey='bl_id';
    protected $guarded=[];
}
