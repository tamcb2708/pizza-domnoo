<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='pz-comment';
    protected $primaryKey='comm_id';
    protected $guarded=[];
}
