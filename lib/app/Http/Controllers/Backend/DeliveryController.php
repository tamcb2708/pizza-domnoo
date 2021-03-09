<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FreeShip;
use App\Model\City;
use App\Model\Province;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Model\Wards;
class DeliveryController extends Controller
{
    public function delivery(Request $request){
    	$city=City::orderby('matp','ASC')->get();
    	return view('backend.delivery')->with(compact('city'));
    }
    public function select_delivery(Request $request){
    	$data= $request->all();
    	if($data['action']){
    		$output=''; 
    		if($data['action']=="city"){
    			$select_provice= Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
    			      $output.='<option><<----Chọn Quận Huyện---->></option>';
    			foreach ($select_provice as $key => $provice) {
    				# code...
    				$output.='<option value="'.$provice->maqh.'">'.$provice->name_quanhuyen.'</option>';
    			}

    		}else{
    			$select_wards= Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
    			      $output.='<option><<----Chọn Xã Phường---->></option>';
    			foreach ($select_wards as $key => $ward) {
    				# code...
    				$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
    			}
    		} 

    	}
    	echo $output;
    }
    public function insert_delivery(Request $request){
    	$data=$request->all();
    	$free_ship= new FreeShip();
    	$free_ship->fre_matp=$data['city'];
    	$free_ship->fre_maqh=$data['province'];
    	$free_ship->fre_xaid=$data['wards'];
    	$free_ship->fre_ship=$data['fre_ship'];
    	$free_ship->save();
    }
    public function select_freeship(){
    	$freeship=FreeShip::orderby('fre_id','DESC')->get();
    	$output='';
    	$output.='<div class="table-responsive">
    	    <table class="table table-bordered">
    	      <thread>
    	          <tr>
    	              <th>Tên Thành Phố</th>
    	              <th>Tên Quận Huyện</th>
    	              <th>Tên Xã Phường</th>
    	              <th>Giá Ship</th>
    	          </tr>
    	      </thread>
    	      <tbody>
    	            ';
    	            foreach ($freeship as $key => $free) {
    	            	$output.='
    	            	<tr>
    	               <td>'.$free->city->name_city.'</td>
    	               <td>'.$free->province->name_quanhuyen.'</td>
    	               <td>'.$free->wards->name_xaphuong.'</td>
    	               <td contenteditable data-freeship_id="'.$free->fre_id.'" class="free_ship_edit">'.number_format($free->fre_ship,0,',','.').'</td>
    	                </tr>
    	                ';
    	            }
    	           
    	        $output.='
    	      </tbody>
    	    </table>
    	        </div>
    	        ';
    	        echo $output;	
    }
    public function update_delivery(Request $request){
    	$data=$request->all();
    	$free_ship=FreeShip::find($data['fre_ship_id']);
    	$free_value=rtrim($data['fre_ship_value'],'.');
    	$free_ship->fre_ship=$free_value;
    	$free_ship->save();

    }
}
