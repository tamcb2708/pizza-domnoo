<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FreeShip extends Model
{
    public $timestamps=false;
	protected $fillable=[
		'fre_matp','fre_maqh','fre_xaid','fre_ship'
	];
    protected $table='pz-freeship';
    protected $primaryKey='fre_id';
    public function city(){
    	return $this->belongsTo('App\Model\City','fre_matp');
    }
    public function province(){
    	return $this->belongsTo('App\Model\Province','fre_maqh');
    }
    public function wards(){
    	return $this->belongsTo('App\Model\Wards','fre_xaid');
    }
}
