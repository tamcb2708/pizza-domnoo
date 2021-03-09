<?php

namespace App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $table='pz-user';
    protected $primaryKey='ad_id';
    protected $guarded=[];

    public function roles(){
        return $this->belongsToMany('App\Model\Roles');
    }

    public function getAuthPassword()
    {
        return $this->ad_password;
    }
    public function hasAnyRoles($role){
        return null !==$this->roles()->whereIn('rol_name',$role)->first();

    }
    public function hasRole($role){
        return null !== $this->roles()->where('rol_name',$role)->first();
    }
}
