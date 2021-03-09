<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table='pz-roles';
    protected $primaryKey='rol_id';
    protected $guarded=[];

    public function user(){
        return $this->belongsToMany('App\Model\User');
    }
}
