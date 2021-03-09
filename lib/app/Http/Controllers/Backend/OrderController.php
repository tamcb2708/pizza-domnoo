<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Model\Product;
use Illuminate\Support\Carbon;
use App\Model\Statistical;
use App\Model\Customer;
use App\Model\Shipping;
use App\Model\Coupon;
class OrderController extends Controller
{
    public function delete_order($order_code){
		DB::table('pz-order')->where('order_code',$order_code)->delete();
        Session::put('message',' xóa hóa đơn thành công');
        return Redirect::to('admin/order');  
	}
		public function delete($order_code){
		DB::table('pz-order')->where('order_code',$order_code)->delete();
        Session::put('message',' xóa hóa đơn thành công');
        return Redirect::to('admin/order');  
	}
	public function update_quantity(Request $request){
		$data = $request->all();
		$order_details = Order_detail::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
		$order_details->product_quantity = $data['order_quantity']; 
		$order_details->save();
	}
	public function update_order_qty(Request $request){
		$data=$request->all();
		$order = Order::find($data['order_id']);
		$order->order_status=$data['order_status'];
		$order->save();

		$order_date=$order->order_date;
		$static = Statistical::where('order_date',$order_date)->get();
		if($static){
			$static_count=$static->count();
		}else{
			$static_count=0;
		}
		if($order->order_status==2){
			$total_order=0;
			$sales=0;
			$profit=0;
			$quantity=0;
			foreach ($data['order_product_id'] as $key => $or_p_id) {
				# code...
				$product=Product::find($or_p_id);
				$product_quantity = $product->pr_sold;
				$product_sold = $product->pr_sold;
				$product_price=$product->pr_price;
				$now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
				foreach ($data['quantity'] as $key2 => $qty) {
					# code...
					if($key==$key2){
						$product_remain = $product_quantity - $qty;
						$product->pr_sold = $product_remain;
						$product->pr_sold = $product_sold + $qty;
						$product->save();
						$quantity+=$qty;
						$total_order+=1;
						$sales=$product_price*$qty;
						$profit=$sales-$sales*10/100;
					}
				}
			}
			if($static_count>0){
				$static_update=Statistical::where('order_date',$order_date)->first();
				$static_update->sales=$static_update->sales+$sales;
				$static_update->profit=$static_update->profit+$profit;
				$static_update->quantity=$static_update->quantity+$quantity;
				$static_update->total_order=$static_update->total_order+$total_order;
				$static_update->updated_at=$static_update->total_order+$total_order;

				$static_update->save();
			}else{
				$static_new=new Statistical();
				$static_new->order_date=$order_date;
				$static_new->sales=$sales;
				$static_new->profit=$profit;
				$static_new->quantity=$quantity;
				$static_new->total_order=$total_order;
				$static_new->save();

			}
		}
	}
    public function all_order(){ 
    	$data['items']=DB::table('pz-order')->orderBy('order_id','desc')->paginate(12);
        $data['ite']=Order::orderBy('order_id','DESC')->paginate(12);
    	return view('backend.order',$data);
    }
    public function view_order($order_code){
    	$order_detail=Order_detail::where('order_code',$order_code)->get();
    	$ord=Order::orderby('created_at','DESC')->whereNotIn('order_code',[$order_code])->get();
    	$order=Order::where('order_code',$order_code)->get();
    	$orders=Order::where('order_code',$order_code)->get();
    	foreach ($order as $key => $or) {
    		# code...
    		$customer_id=$or->customer_id;
    		$phipping_id=$or->shipping_id;
    		$order_status=$or->order_status;
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

    	return view('backend.order-detail')->with(compact('order_detail','customer','shipping','order_details','coupon_condition','coupon_number','ord','orders','order_status'));
    }
    // public function print_order($checkout_code){
    // 	$pdf = \App::make('dompdf.wrapper');
    // 	$pdf->loadHTML($this->print_order_convert($checkout_code));
    // 	return $pdf->stream();
    // }
    public function print_order_convert($checkout_code){
    	return $checkout_code;
    }
}
