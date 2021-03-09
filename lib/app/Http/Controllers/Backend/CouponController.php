<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Model\Coupon;
use Illuminate\Support\Facades\DB;
class CouponController extends Controller
{
    public function add_coupon()
    {
    	return view('backend.add-coupon');

    }
    public function all_coupon()
    {
        $all=DB::table('pz-coupon')->get();
        $data=view('backend.coupon')->with('all',$all);
    	return view('backend-view')->with('backend.coupon',$data);
    }
    public function save_coupon(Request $request)
    {
    	$data=array();
    	$data['con_name']=$request->name;
    	$data['con_code']=$request->code;
    	$data['con_number']=$request->number;
    	$data['con_condition']=$request->condition;
    	$data['con_time']=$request->time;
    	DB::table('pz-coupon')->insert($data);
    	Session::put('message','Thêm Mã Giảm Giá Thành Công');
    	return Redirect::to('admin/coupon/add-coupon');
    }
    public function edit_coupon($id)
    {
        $all=DB::table('pz-coupon')->where('con_id',$id)->get();
        $data=view('backend.edit-coupon')->with('all',$all);
        return view('backend-view')->with('backend.edit-coupon',$data);
    }
    public function update_coupon($id,Request $request)
    {
        $data=array();
        $data['con_name']=$request->name;
    	$data['con_code']=$request->code;
    	$data['con_number']=$request->number;
    	$data['con_condition']=$request->condition;
    	$data['con_time']=$request->time;
        DB::table('pz-coupon')->where('con_id',$id)->update($data);
        Session::put('message',' Sửa Mã Giảm Giá Thành Công');
        return Redirect::to('admin/coupon');
    }
    public function delete_coupon($id)
    {
        DB::table('pz-coupon')->where('con_id',$id)->delete();
        Session::put('message','Xóa Mã Giảm Giá Thành Công');
        return Redirect::to('admin/coupon');   
    }
}
