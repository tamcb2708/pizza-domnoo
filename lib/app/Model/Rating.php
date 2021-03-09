<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table='pz-rating';
    protected $primaryKey='ra_id';
    protected $guarded=[];
}
