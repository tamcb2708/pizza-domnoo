@extends('frontend-view')
@section('title','giỏ hàng')
@section('content')
@if(Session::get('cart')==true)
		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2>Domnoo Restaurent</h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
				  <li class="breadcrumb-item active"><a href="{{asset('gio-hang')}}">Giỏ Hàng</a></li>
				</ol>
			</div>
		</section><!-- banner -->
		<section class="shopping-cart new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
						@if(session()->has('message'))
							<div class="alert alert-success">
							  {!!session()->get('message')!!}
							</div>
						@else(session()->has('error'))
							 <div class="alert alert-success">
							  {!!session()->get('error')!!}
							</div>
						@endif
						<form action="{{asset('cart/update-cart')}}" method="POST">
							@csrf
							<table class="table cart-tbl">
							<thead>
								<tr>
									<th class="p_dtl">Tên Sản Phẩm</th>
									<th class="p_btn"></th>
									<th class="p_price">Giá Tiền</th>
									<th class="p_quantity">Số Lượng</th>
									<th class="p_ttl">Tổng</th>
								</tr>
							</thead>
							<tbody>
								@php
								$total=0;
							    @endphp
								@foreach (Session::get('cart') as $cart)
								@php
								$subtotal= $cart['product_price']*$cart['product_qty'];
								$total +=$subtotal;
							    @endphp
								<tr>
									<td class="p_dtl">
										<div class="block-stl9">
											<div class="img-holder">
												<img src="{{asset('public/upload/image/'.$cart['product_img'])}}" alt="" class="img-responsive">
											</div>
											<div class="info-block">
												<h5>{{$cart['product_name']}}</h5>
												<p class="ab-txt-block">
													@if($cart['product_size']==1)
													Cỡ 12 inch
												 @elseif($cart['product_size']==2)
													Cỡ 9 inch
												  @elseif($cart['product_size']==3)
													Cỡ 7 inch
										   @endif
										   @if($cart['product_base']==1)
										        +
													Đế Mỏng
												 @elseif($cart['product_base']==2)
													Đế Vừa
												  @elseif($cart['product_base']==3)
													Đé Dày
										   @endif
										   @if($cart['product_extra']==1)
										   +
										   Thêm Phô Mai
										@elseif($cart['product_extra']==2)
										   +
										   Gấp Đôi Phô Mai
										 @elseif($cart['product_extra']==3)
										   +
										   Gấp Ba Phô Mai
										   @elseif($cart['product_extra']==0)

										@else
										   + Tùy Chọn Khác
										@endif

										@if($cart['product_rim']==1)
										   + 
										   {{-- {{$rim_next}} --}}
										 Viền Phô Mai
										 @elseif($cart['product_rim']==2)
										   + 
										 Viền Sô Cô La
										 @elseif($cart['product_rim']==0)
										 
										@else
										  + Có Viền Khác

									 @endif
												</p>
											</div>
										</div>
									</td>
									<td class="p_btn">
										<a style="background-color: red" href="{{asset('cart/delete-cart/'.$cart['session_id'])}}" class="btn1 stl3">Xóa</a>
									</td>
									<td class="p_price">
										{{number_format($cart['product_price'],0,',','.')}}VND
									</td>
									<td class="p_quantity">
										<div class="quantity">
											<input type="number" name="cart_qty[{{$cart['session_id']}}]" class="form-control text-center" value="{{$cart['product_qty']}}" min="1">
										</div>
									</td>
									<td class="p_ttl"> 
										{{number_format($subtotal,0,',','.')}}VND
									</td>
								</tr>
								@endforeach
							</tbody>
							</table>
							<td class="p_btn">
								<input style="background-color: red" type="submit" name="cart_update" value="Cập Nhập" class="btn1 stl3">
								<a style="background-color: red" href="{{asset('cart/delete-all')}}" class="btn1 stl3">Xóa Toàn Bộ</a>
								@if(Session::get('coupon'))
								<a style="background-color: red" href="{{asset('cart/delete-coupon')}}" class="btn1 stl3">Xóa Mã Khuyến Mãi</a>
								@endif
							</td>
						</form>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>

		<section class="loc-cop-sum  new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="block-stl10">
							<h3>Nhập Mã Giảm Giá :</h3>
							<p>Hãy Tham Gia Các Chương Trình sự kiện của chúng tôi để được nhận code ..</p>
							<form action="{{asset('cart/check-coupon')}}" method="POST">
								@csrf
								<div class="form-group">
									<input type="text"  name="coupon" class="form-control" placeholder="Nhập Mã..........">
								</div>
								<button class="check_coupon btn btn5">Chọn</button>
							</form>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-xs-12">
						<div class="block-stl10 odr-summary">
							<h3>Hóa Đơn :</h3>
							<ul class="list-unstyled">
								@if(Session::get('coupon'))
								@foreach(Session::get('coupon') as $cou)
									 @if($cou['coupon_condition']==1)
	
										 Mã Giảm :{{$cou['coupon_number']}} % Giá trị giỏ hàng
									 
										  <p> 
												@php
												   $total_coupon=($total*$cou['coupon_number'])/100;
												   echo '<p>Tổng tiền được giảm:'.number_format($total_coupon,0,',','.').'VND</p>'
												@endphp
										   </p>
										  <h3>Tổng Tiền Sau Khi Giảm: {{number_format($total-$total_coupon,0,',','.')}} VND</h3>
									  @elseif($cou['coupon_condition']==0)
										  Mã Giảm : {{number_format($cou['coupon_number'],0,',','.')}} VND;
									 
										  <p>
												@php
												   $total_coupon=$total-$cou['coupon_number'];
												@endphp
										   </p>
										  <h3>Tổng Tiền Sau Khi Giảm: {{number_format($total_coupon,0,',','.')}} VND</h3>
									 @endif
								@endforeach
							@endif 
							</ul>
							<div class="ttl-all">
								<span class="ttlnm">Tổng Tiền Cần Thanh Toán</span>
								@if(Session::get('coupon'))
								<span class="odr-stts">{{number_format($total-$total_coupon,0,',','.')}}VND</span>
								@else
								<span class="odr-stts">{{number_format($total,0,',','.')}}VND</span>
								@endif
							</div>
						</div>
						@if(Session::get('cus_id'))
						<a class="btn btn1 stl2" href="{{asset('/nguoi-dung/thanh-toan.html')}}">Thanh Toán</a>
					 @else
						<a class="btn btn1 stl2" href="{{asset('/nguoi-dung/dang-nhap.html')}}">Thanh Toán</a>
					 @endif
					 
					</div>
				</div>
			</div>
		</section>
@else
<section class="about-us-block new-block">
	<div class="container-fluid">
		<div class="row">
			<div class="col-custom1 pd0">
				<div class="img-holder">
					<img src="images/img17.jpg" alt="" class="img-responsive">
				</div>
			</div>
			<div class="col-custom2 pd0">
				<div class="fixed-bg">
					<img src="images/bg8.jpg" alt="" class="img-responsive">
				</div>
				<div class="block-stl12">
					<div class="title">
						<p class="top-h">Một Sự Thật Thú Vị</p>
						<h2>Giỏ Hàng Bạn Đang trống</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</section>
<section class="great-thankful new-block">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="th-slider owl-theme owl-carousel">
					@foreach ($brand as $item)
				<div class="item">
					<div class="img-holder">
						<img src="{{asset('public/upload/image/'.$item->bra_image)}}" alt="" class="img-responsive img1">
						<img src="{{asset('public/upload/image/'.$item->bra_image)}}" alt="" class="img-responsive img2">
					</div>
				</div>
				@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
@endif
@endsection