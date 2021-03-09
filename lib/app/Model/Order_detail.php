<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table='pz-order-detail';
    protected $primaryKey='order_detail_id';
    protected $guarded=[];

    public function product(){
    	return $this->belongsTo('App\Model\Product','product_id');
    }
}
