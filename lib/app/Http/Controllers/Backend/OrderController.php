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
use PDF;
use Mail;

session_start();
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
			  //send mail
			  $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
			  $title_mail = "Đơn hàng của bạn đã được xác nhận và đang giao". ' '. $now;
			  $customer = Customer::where('cus_id',$order->customer_id)->first();
			  $data['email'][] = $customer->cus_email;
			  $shipping = Shipping::where('ship_id',$order->shipping_id)->first();
			  $order_detail = Order_detail::where('order_code',$order->order_code)->first();
			  $coupon_mail = $order_detail->product_coupon;

			  foreach($data['order_product_id'] as $key => $product){
				  $product_mail = Product::find($product);
				  foreach($data['quantity'] as $key2 =>$qty){
					  if($key == $key2){
						$cart_array[] = array(
							'product_name' =>$product_mail['pr_name'],
							'product_price' =>$product_mail['pr_price'],
							'product_qty' =>$qty,
						);
					  }
				  }
			  }
			  $shipping_array = array(
				  'customer_name' =>$customer->cus_name,
				  'shipping_name' =>$shipping->ship_name,
				  'shipping_phone' =>$shipping->ship_phone,
				  'shipping_address' =>$shipping->ship_address,
				  'shipping_note' =>$shipping->ship_note,
				  'shipping_method' =>$shipping->ship_paymment
			  );
			  $ordercode_mail =array(
				  'coupon_code' =>$coupon_mail,
				  'order_code' =>$order->order_code	
			  );
			  Mail::send('backend.confirm-mail-order',['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'ordercode_mail'=>$ordercode_mail], function ($message) use ($title_mail,$data) 
			  {
				  $message->to($data['email'])->subject($title_mail);
				  $message->from($data['email'], $title_mail);
			  });
		}
	}
    public function all_order(){ 
    	$data['items']=DB::table('pz-order')->orderBy('order_id','desc')->paginate(12);
        $data['ite']=Order::orderBy('order_id','DESC')->paginate(12);
    	return view('backend.order',$data);
    }
    public function view_order($order_code){
    	$order_detail=Order_detail::where('order_code',$order_code)->get();
    	$ord=Order::orderby('created_at','DESC')->whereNotIn('order_code',[$order_code])->paginate(4);
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
    	$order_details_product=Order_detail::with('product')->where('order_code',$order_code)->get();
    	foreach ($order_details_product as $key => $order_id) {
    		# code...
    		$product_coupon = $order_id->product_coupon;
    	}
    	if($product_coupon != 'No'){
    		$coupon = Coupon::where('con_code',$product_coupon)->first();
    	    $coupon_condition = $coupon->con_condition;
    	    $coupon_number = $coupon->con_number;
    	}else{
    		$coupon_condition=2;
    		$coupon_number=0;
    	}

    	return view('backend.order-detail')->with(compact('order_detail','customer','shipping','order_details_product','coupon_condition','coupon_number','ord','orders','order_status'));
    }
    public function print_order($checkout_code){
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf->loadHTML($this->print_order_convert($checkout_code));
    	return $pdf->stream();
    }
    public function print_order_convert($checkout_code){
		$order_detail=Order_detail::where('order_code',$checkout_code)->get();
		$order=Order::where('order_code',$checkout_code)->get();
		foreach ($order as $key => $or) {
    		# code...
    		$customer_id=$or->customer_id;
    		$phipping_id=$or->shipping_id;
    	}
		$customer=Customer::where('cus_id',$customer_id)->first();
    	$shipping=Shipping::where('ship_id',$phipping_id)->first();
		$order_details_product=Order_detail::with('product')->where('order_code',$checkout_code)->get();
		foreach ($order_details_product as $key => $order_id) {
    		# code...
    		$product_coupon = $order_id->product_coupon;
    	}
		if($product_coupon != 'No'){
    		$coupon = Coupon::where('con_code',$product_coupon)->first();
    	    $coupon_condition = $coupon->con_condition;
    	    $coupon_number = $coupon->con_number;
    	}else{
    		$coupon_condition=2;
    		$coupon_number=0;
    	}
		$order_details_product=Order_detail::with('product')->where('order_code',$checkout_code)->get();
		$output='';
		$output.='
		<style>
		    body{
				font-family: Dejavu Sans;
			}
		</style>
		<p><center>Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam</center><p>
		<p><center>Độc Lập-Tự Do-Hạnh Phúc</center><p>
		<p><center>Domnoo Restaurent</center><p>
		<p>Thông Tin Vận Chuyển</p>
	            	<table  class="table table-bordered" border="1px solib #000 ">
		               <thead>
					        <tr>
							    <th>Người Nhận</th>
								<th>Địa Chỉ Người Nhận</th>
								<th>Số Điện Thoại</th>
								<th>Ghi Chú</th>
							</tr>			   
					   </thead>	
					   <tbody>';
					       $payment=0;
						   if($shipping->ship_paymment==1){
							   $payment= "Thu Tiền";
						   }else{
							$payment= "Không Phải Thu";
						   }
			$output.='     <tr>
			                    <td>'.$shipping->ship_name.'</td>
								<td>'.$shipping->ship_address.'</td>
								<td>'.$shipping->ship_phone.'</td>
								<td>'.$shipping->ship_note.'</td>
			                </tr>';
			$output.=' 		          
					   </tbody>	
		            </table>
					<p>Thông Tin Đơn Hàng</p>
	            	<table  class="" border="1px solib  ">
		               <thead>
					        <tr>
							    <th>STT</th>
							    <th>Tên Sản Phẩm</th>
								<th>Thông Tin Thêm</th>	
								<th>Đơn Giá</th>
								<th>Số Lượng</th>
								<th>Tổng Tiền</th>
							</tr>			   
					   </thead>	
					   <tbody>';
					   $total=0;
					   $i=0;
					   $total_coupon = 0;
					   foreach($order_details_product as $key =>$product){
						     $i++;
					         $subtotal=$product->product_price*$product->product_quantity;
							 $total +=$subtotal;
							 $product_size=0;
							 $product_base=0;
							 $product_extra=0;
							 $product_rim=0;
							 if($product->product_base==1){
								$product_base=  "Cỡ 12 inch";
							}elseif($product->product_base==2){
							   $product_base=  "Cỡ 9 inch";
							}elseif($product->product_base==3){
							   $product_base=  "Cỡ 7 inch";
							}else{
							   $product_base=  "";
							}
							 if($product->product_size==1){
								 $product_size=  "+ Đế Mỏng";
							 }elseif($product->product_size==2){
								$product_size=  "+ Đế Vừa";
							 }elseif($product->product_size==3){
								$product_size=  "+ Đế Dày";
							 }else{
								$product_size=  "";
							 }
							 if($product->product_extra==1){
								$product_extra=  "+ Thêm Phô Mai";
							}elseif($product->product_extra==2){
							   $product_extra=  "+ Gấp Đôi Phô Mai";
							}elseif($product->product_extra==3){
							   $product_extra=  "+ Gấp Ba Phô Mai";
							}else{
							   $product_extra=  "";
							}
							if($product->product_rim==1){
								$product_rim=  "+ Viền Phô Mai";
							}elseif($product->product_rim==2){
							   $product_rim=  "+ Viền Sô Cô La";
							}else{
							   $product_rim=  "";
							}
			$output.='     <tr>  
			                    <td>'.$i.'</td>
			                    <td>'.$product->product_name.'</td>
								<td> 
					                 '.$product_base.''.$product_size.''.$product_extra.''.$product_rim.'
								</td>
								<td>'.number_format($product->product_price,0,',','.').'VND	'.'</td>
								<td>'.$product->product_quantity.'</td>
								<td>'.number_format($subtotal,0,',','.').'VND'.'</td>
			                </tr>';
					   }
					   if($coupon_condition==1){
						$total_after_coupon = ($total*$coupon_number)/100;
						$total_coupon=$total - $total_after_coupon + $product->product_freeship;
				   }else{
					    $total_after_coupon=0;
						$total_coupon=$total-$coupon_number + $product->product_freeship;
				   }
			$output.='

			<tr>
			    <td colspan="4">
				   <p>Giảm: '.number_format($total_after_coupon,0,',','.').'VND	'.'</p>
				   <p>Ship: '.number_format($product->product_freeship,0,',','.').'VND	'.'</p>
				   <p>Thanh Toán: '.number_format($total_coupon,0,',','.').'VND	'.'</p>
				   <p>'.$payment.'</p>
				</td>
				<td colspan="2">
				<p><center>Ký Nhận</center></p>
			 </td>
			</tr>';
			$output.=' 		          
					   </tbody>	
		            </table>
					<center><cite>Họ Và Tên Người Giao</cite></center>
					';					
		return $output;
    } 
}
