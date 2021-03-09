<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Model\Product;
use App\Model\Coupon;
use PDO;

session_start();
class CartController extends Controller 
{
    public function cart(Request $request){
        // $cart=Session::get('cart');
        // if($cart==true){
        //     foreach($cart as $key =>$val){
        //         $product_rim=$val['product_rim'];
        //         $product=$val['product_id'];
        //         $prod=DB::table('pz-product')->where('pr_id',$product)->get();
        //         $rim=DB::table('pz-rim')->where('ri_id',$product_rim)->get();
        //         foreach($rim as $key =>$vlon){
        //             $rim_next=$vlon->ri_name;
        //             $ri=$vlon->ri_id;
        //             if($product_rim==0){
        //                 $rim_next=0;
        //                 $ri=0;
        //             }
        //         }
        //     }
        //     $rim_next=0;
        //     $ri=0;
        // }else{
        //     $rim_next=0;
        //     $ri=0;
        // }
        $extra=DB::table('pz-extra')->get();
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $url_can=$request->url();
        $cate_product=DB::table('pz-category')->orderby('cate_id','desc')->get();
        // $brand_product=DB::table('vp-brand')->where('bra_status',0)->orderby('bra_id','desc')->get();
        return view('frontend.cart')->with('brand',$brand)->with('extra',$extra);
    }
    public function add_cart(Request $request){
        $data=$request->all(); 
        $session_id=substr(md5(microtime()),rand(0,26),5);
        $cart=Session::get('cart');
        $is_avaiable=0;
        if($cart==true){
            foreach($cart as $key => $val)
            {
                if($val['product_id']==$data['cart_product_id'])
                {
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_img' => $data['cart_product_img'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_size' => $data['cart_product_size'],
                    'product_base' => $data['cart_product_base'],
                    'product_extra' => $data['cart_product_extra'], 
                    'product_rim' => $data['cart_product_rim'],
                    'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
            }
        }
        else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_img' => $data['cart_product_img'],
                'product_qty' => $data['cart_product_qty'],
                'product_size' => $data['cart_product_size'],
                'product_base' => $data['cart_product_base'],
                'product_extra' => $data['cart_product_extra'],
                'product_rim' => $data['cart_product_rim'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
    }
    public function delete_cart($session_id){
        $cart=Session::get('cart');
        // echo'<pre>';
        // print_r($cart);
        // echo'<pre>';
        if('cart'==true){
            foreach ($cart as $key => $value) {
                if($value['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa Sản Phẩm Thành Công ');
        }
        else{
             return redirect()->back()->with('message','Xóa Sản Phẩm Thất Bại');
        }
    }
    public function update_cart(Request $request){
        $data= $request->all();
        $cart=Session::get('cart');
        if($cart==true){
            $message='';
            foreach ($data['cart_qty'] as $key => $value) {
                $i=0;
                foreach($cart as $session => $val){
                    $i++;
                    if($val['session_id']==$key && $value<10){
                        $cart[$session]['product_qty']=$value;
                        $message.= '<p style="color:blue">'.$i.')Thông báo: Cập Nhập Số Lượng Sản Phẩm:' .$cart[$session]['product_name']. 'Thành Công</p>';
                    }elseif($val['session_id']==$key && $value>10){
                        $message.= '<p style="color:red">'.$i.')Thông Báo: Cập Nhập Số Lượng Sản Phẩm:' .$cart[$session]['product_name']. 'Thất Bại</p>';
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message',$message);  
        }else{
            return redirect()->back()->with('message','Cập Nhập Thất Bại');
        }
    }
    public function delete_all(){
        $cart=Session::get('cart');
        if($cart==true){
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa Hết Thành Công');
        }
    }
    public function check_coupon(Request $request){
        $data=$request->all();
        $coupon=Coupon::where('con_code',$data['coupon'])->first();
        if($coupon){
            $cout_coupon=$coupon->count();
            if($cout_coupon>0){
                $coupon_session=Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable=0;
                    if($is_avaiable==0){
                        $cou[]=array(
                         
                            'coupon_code'=>$coupon->con_code,
                            'coupon_condition'=>$coupon->con_condition,
                            'coupon_number'=>$coupon->con_number,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                     $cou[]=array(
                            
                            'coupon_code'=>$coupon->con_code,
                            'coupon_condition'=>$coupon->con_condition,
                            'coupon_number'=>$coupon->con_number,

                        );
                        Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm Mã Giảm Giá Thành Công');
            }
        }else{
            return redirect()->back()->with('error','Mã Giảm Giá Không Đúng');
        }
    }
    public function delete_coupon(){
        $coupon=Session::get('coupon');
        if($coupon==true){
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa Mã Giảm Giá Thành Công');
        }
    }
}
