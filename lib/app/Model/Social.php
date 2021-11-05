<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = false;

    protected $fillable = [
          'social_provider_id',  'social_provider',  'social_user'
    ];
 
    protected $primaryKey = 'social_id';

 	protected $table = 'pz_social';

 	public function login(){
 		return $this->belongsTo('App\Model\Customer', 'social_user');
 	}
}
