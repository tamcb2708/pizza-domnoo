<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='pz-product';
    protected $primaryKey='pr_id';
    protected $guarded=[];
}
