<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Model\Customer;
use App\Model\City;
use Illuminate\Support\Facades\Session;
use App\Model\Province;
use App\Model\Wards;
use App\Model\FreeShip;
use App\Model\Order;
use App\Model\Order_detail;
use Illuminate\Support\Carbon;
use App\Model\Shipping;
use App\Model\Coupon;
session_start();
class CustomerController extends Controller
{
    public function dang_nhap(){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.login')->with('brand',$brand);
    }
    public function check_dang_nhap(Request $request){
        $email=$request->email;
        $password=md5($request->password);
        $result=DB::table('pz-customer')->where('cus_email',$email)->where('cus_password',$password)->first();
        if($result){
            Session::put('cus_id',$result->cus_id);
            return Redirect::to('nguoi-dung/tai-khoan.html');
        }else{
            $this->validate($request,[
                'email'=>'required|max:255',
                'password'=>'required|max:255',
            ]);
            return Redirect::to('nguoi-dung/dang-nhap.html')->with('error','tài khoản hoặc mật khẩu không đúng mời nhập lại');
        }
    }
    public function dang_ky(){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.register')->with('brand',$brand);
    }
    public function dang_ky_tai_khoan(Request $request){
        $this->validation($request);
        $data=$request->all();
        $data=array();
        $email=$request->email;
        $result=DB::table('pz-customer')->where('cus_email',$email)->first();
        if( $result){
            return Redirect::to('nguoi-dung/dang-ky.html')->with('error','email bạn nhập đã được dùng mời nhập lại');
        }else{
            $data['cus_name']=$request->name;
            $data['cus_email']=$request->email;
            $data['cus_address']=$request->address;
            $data['cus_phone']=$request->phone;
            $data['cus_password']=md5($request->password);
            $cus_id=DB::table('pz-customer')->insertGetId($data);
            Session::put('cus_id',$cus_id);
            Session::put('cus_name',$request->name);
            return Redirect::to('nguoi-dung/tai-khoan.html');
        }
    }
    public function validation($request){
        return $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:255',
            'address'=>'required|max:255',
            'password'=>'required|max:255',
        ]);
    }
    public function tai_khoan(){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.account')->with('brand',$brand);
    }
    public function dang_xuat(){
        Session::flush();
        return Redirect::to('nguoi-dung/dang-nhap.html');
    }
    public function thanh_toan(){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get(); 
        $city=City::orderby('matp','ASC')->get();
        return view('frontend.checkout')->with('city',$city)->with('brand',$brand);
    }
    public function select_delivery(Request $request){
        $data= $request->all();
        if($data['action']){
            $output=''; 
            if($data['action']=="city"){
                $select_provice= Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                      $output.='<option><<----chọn quận huyện---->></option>';
                foreach ($select_provice as $key => $provice) {
                    # code...
                    $output.='<option value="'.$provice->maqh.'">'.$provice->name_quanhuyen.'</option>';
                }

            }else{
                $select_wards= Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                      $output.='<option><<----chọn xã phường---->></option>';
                foreach ($select_wards as $key => $ward) {
                    # code...
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
             echo $output;
        }
    }
    public function calculate_free(Request $request){
        $data=$request->all();
        if($data['matp']){
            $freeship = FreeShip::where('fre_matp',$data['matp'])->where('fre_maqh',$data['maqh'])->where('fre_xaid',$data['xaid'])->get();
            if($freeship){
                $cout_freeship=$freeship->count();
                if($cout_freeship>0){
                    foreach ($freeship as $key => $free) {
                     # code...
                       Session::put('free',$free->fre_ship);
                       Session::save();
                    }     
                }else{
                       Session::put('free',50000);
                       Session::save();
                }
            }
        }
    }
    public function delete_free(){
        Session::forget('free');
        return redirect()->back();
    }
    public function confirm_order(Request $request){
        $today=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');

        $data=$request->all();
        $shipping=new Shipping();
        $shipping->ship_name = $data['shipping_name'];
        $shipping->ship_address = $data['shipping_address'];
        $shipping->ship_phone = $data['shipping_phone'];
        $shipping->ship_note = $data['shipping_note'];
        $shipping->ship_paymment = $data['shipping_method'];
        $shipping->save();

        $shipping_id = $shipping->ship_id;
        $check_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order();
        $order->customer_id = Session::get('cus_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code =  $check_code;
        $order->created_at=$today;
        $order->order_date=$order_date;
        $order->save();

        $order_detail = new Order_detail();
        if(Session::get('cart')){
            foreach (Session::get('cart') as $key => $cart) {
                # code...
                $order_detail = new Order_detail();
                $order_detail->order_code = $check_code;
                $order_detail->product_id = $cart['product_id'];
                $order_detail->product_image = $cart['product_img'];
                $order_detail->product_size = $cart['product_size'];
                $order_detail->product_base = $cart['product_base'];
                $order_detail->product_extra = $cart['product_extra'];
                $order_detail->product_rim = $cart['product_rim'];
                $order_detail->product_name = $cart['product_name'];
                $order_detail->product_price = $cart['product_price'];
                $order_detail->product_quantity =  $cart['product_qty'];
                $order_detail->product_coupon = $data['order_coupon'];
                $order_detail->product_freeship = $data['order_free'];
                $order_detail->save();
            }
        }
        Session::forget('coupon');
        Session::forget('free');
        Session::forget('cart');
    } 
    public function lich_su(Request $request){
        if(!Session::get('cus_id')){
            return redirect('cart/login-checkout')->with('error','Vui Lòng Đăng Nhập Để Xem Thông Tin');
        }else{
            $brand=DB::table('pz-brand')->where('bra_status',0)->get();
            $customer=Customer::where('cus_id',Session::get('cus_id'))->find(Session::get('cus_id'));
            $getorder=Order::where('customer_id',Session::get('cus_id'))->orderby('order_id','DESC')->paginate(6);
            return view('frontend.history')->with(compact('getorder','customer'))->with('brand',$brand);
        }
    }
    public function thong_tin(){
        if(!Session::get('cus_id')){
            return redirect('cart/login-checkout')->with('error','Vui Lòng Đăng Nhập Để Xem Thông Tin');
        }else{
            $brand=DB::table('pz-brand')->where('bra_status',0)->get();
            $customer=Customer::where('cus_id',Session::get('cus_id'))->find(Session::get('cus_id'));
            $getorder=Order::where('customer_id',Session::get('cus_id'))->orderby('order_id','DESC')->get();
            return view('frontend.customer')->with(compact('getorder','customer'))->with('brand',$brand);
        }
    }
    public function luu(Request $request){
        $this->validate($request,[
            'acc_name'=>'required|max:255',
            'acc_phone'=>'required',
            'acc_address'=>'required|max:255',
            'acc_password'=>'required|min:5|max:255',
        ]);
        $data=array(); 
            $data['cus_name']=$request->acc_name;
            $data['cus_email']=$request->acc_email;
            $data['cus_address']=$request->acc_address;
            $data['cus_phone']=$request->acc_phone;
            $data['cus_password']=md5($request->acc_password);
            DB::table('pz-customer')->where('cus_id',Session('cus_id'))->update($data);
            return Redirect::to('nguoi-dung/thong-tin.html');
    }
    public function chi_tiet($order_code){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $order_detail=Order_detail::where('order_code',$order_code)->get();
        $ord=Order::orderby('created_at','DESC')->whereNotIn('order_code',[$order_code])->get();
        $order=Order::where('order_code',$order_code)->get();
        $orders=Order::where('order_code',$order_code)->get();
        foreach ($order as $key => $or) {
            # code...
            $customer_id=$or->customer_id;
            $phipping_id=$or->shipping_id;
            $order_status=$or->order_status;
            $order_code=$or->order_code;
        }
        $customer=Customer::where('cus_id',$customer_id)->first();
        $shipping=Shipping::where('ship_id',$phipping_id)->first();
        $order_details=Order_detail::with('product')->where('order_code',$order_code)->get();
        foreach ($order_details as $key => $order_id) {
            # code...
            $product_coupon = $order_id->product_coupon;
        }
        if($product_coupon != 'khong co coupon'){
            $coupon = Coupon::where('con_code',$product_coupon)->first();
            $coupon_condition = $coupon->con_condition;
            $coupon_number = $coupon->con_number;
        }else{
            $coupon_condition=2;
            $coupon_number=0;
        }
        return view('frontend.history-detail')->with('brand',$brand)->with(compact('order_detail','customer','shipping','order_details','coupon_condition','coupon_number','ord','orders','order_status','order_code'));
    }
    public function delete($order_code)
    {
        DB::table('pz-order')->where('order_code',$order_code)->delete();
        Session::put('message','Xóa Đơn Hàng Thành Công');
        return Redirect::to('nguoi-dung/lich-su.html');   
    }
    public function mat_khau(Request $request){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get(); 
        return view('frontend.reset-password')->with('brand',$brand);
    }
    public function check_mat_khau(Request $request){
        $email=$request->email;
        $brand=DB::table('pz-brand')->where('bra_status',0)->get(); 
        $result=DB::table('pz-customer')->where('cus_email',$email)->first();
        if($result){
            return view('frontend.password')->with('email',$email)->with('brand',$brand);
        }else{
            return Redirect::to('nguoi-dung/mat-khau.html')->with('error','email của bạn nhập sai hoặc không tồn tại mời nhập lại !!!');
        }
    }
    public function password(Request $request){
        $email=$request->email;
        $passwords=$request->passwords;
        $password1=$request->password1;
        if($passwords == $password1){
            $data=array(); 
            $data['cus_password']=md5($request->passwords);
            DB::table('pz-customer')->where('cus_email',$email)->update($data);
            return Redirect::to('nguoi-dung/dang-nhap.html');
        }else{
            return Redirect::to('nguoi-dung/mat-khau.html')->with('error','2 Mật Khẩu Không Trùng Khớp Mời Nhập Lại!!!');
        }
    }
}
