<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Model\Coupon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Mail;
use App\Model\Customer;
session_start();

class CouponController extends Controller
{
    public function add_coupon()
    {
    	return view('backend.add-coupon');

    }
    public function all_coupon()
    {
        $today=Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $data['item']=DB::table('pz-coupon')->orderBy('con_id','DESC')->paginate(4);
        $data['ite']=Coupon::orderBy('con_id','DESC')->paginate(4);
    	return view('backend.coupon',$data)->with('today',$today);
    }
    public function save_coupon(Request $request)
    {
    	$data=array();
    	$data['con_name']=$request->name;
    	$data['con_code']=$request->code;
    	$data['con_number']=$request->number;
    	$data['con_condition']=$request->condition;
    	$data['con_time']=$request->time;
        $data['con_date_start']=$request->date_start;
        $data['con_date_end']=$request->date_end;
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
        $data['con_date_start']=$request->date_start;
        $data['con_date_end']=$request->date_end;
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
    public function active($con_id)
    {
        DB::table('pz-coupon')->where('con_id',$con_id)->update(['con_status'=>0]);
        return Redirect::to('admin/coupon');
    }
    public function actived($con_id)
    {
        DB::table('pz-coupon')->where('con_id',$con_id)->update(['con_status'=>1]);
        return Redirect::to('admin/coupon');
    }

    public function send_coupon($con_id)
    {
        $code=Coupon::where('con_id',$con_id)->first();
        $customer = DB::table('pz-customer')->get();
        $today=Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $title_mail = "ma khuyen mai ngay"." ".$today;
        $data=[];
        foreach($customer as $cus){
            $data['cus_email'][] =$cus->cus_email;
        }
        $coupon= array(
            'con_date_start' =>$code['con_date_start'],
            'con_date_end' =>$code['con_date_end'],
            'con_code'=>$code['con_code'],
            'con_number'=>$code['con_number'],
            'con_time'=>$code['con_time'],
            'con_name'=>$code['con_status'],
            'con_status'=>$code['con_status'],

        );
        Mail::send('backend.send-coupon', ['coupon' => $coupon], function ($message) use ($title_mail,$data) 
        {
            $message->to($data['cus_email'])->subject($title_mail);
            $message->from($data['cus_email'], $title_mail);
        });
        return redirect('/admin/coupon')->with('message','gui ma khuyen mai thanh cong');
    }

    public function send_coupon_vip($con_id)
    {
        $code=Coupon::where('con_id',$con_id)->first();
        $customer = DB::table('pz-customer')->get();
        $today=Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $title_mail = "ma khuyen mai ngay"." ".$today;
        $data=[];
        foreach($customer as $cus){
            $data['cus_email'][] =$cus->cus_email;
        }
        $coupon= array(
            'con_date_start' =>$code['con_date_start'],
            'con_date_end' =>$code['con_date_end'],
            'con_code'=>$code['con_code'],
            'con_number'=>$code['con_number'],
            'con_time'=>$code['con_time'],
            'con_name'=>$code['con_name'],
            'con_status'=>$code['con_status'],

        );
        Mail::send('backend.send-coupon',['coupon' => $coupon], function ($message) use ($title_mail,$data) 
        {
            $message->to($data['cus_email'])->subject($title_mail);
            $message->from($data['cus_email'], $title_mail);
        });
        return redirect('/admin/coupon')->with('message','gui ma khuyen mai thanh cong');
    }
}
