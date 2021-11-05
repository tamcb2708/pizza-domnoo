@extends('frontend-view')
@section('title','trang chủ')
@section('content')



	<div class="banner slider1 new-block">
		<div class="fixed-bg" style="background: url('images/slider-bg1.jpg');"></div>
		<div class="slider owl-carousel owl-theme">
			@foreach ($slide as $item)
			<div class="item">
				<div class="slider-block slide1 new-block">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="text-block">
									<div class="img-block ab1" data-animation-in="bounceInDown" data-animation-out="animate-out fadeOutRight">
										<img src="images/pizza.png" alt="" class="img-responsive">
									</div>
									<h1 class="text-stl1" data-animation-in="lightSpeedIn" data-animation-out="animate-out fadeOutRight">{{$item->sl_name}}</h1>
									<div class="number-block" data-animation-in="fadeInUp" data-animation-out="animate-out fadeOutRight">
										<p class="text-stl2">{!!$item->sl_title!!}</p>
										<h2 class="text-stl3">+0355 978 258</h2>
										<div class="text-center">
											<a href="tel:0355978258" class="btn1 stl2">Gọi Tư Vấn Ngay</a>
											<a href="{{asset('/thuc-don.html')}}" class="btn1 stl1">Xem Thực Đơn Hôm Nay Ngay</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="img-block img2">
									<div class="img-holder" data-animation-in="fadeInDown" data-animation-out="animate-out fadeOutRight">
										<img src="{{asset('public/upload/image/'.$item->sl_img)}}" alt="" class="img-responsive ">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .slider-block -->
			</div>
			@endforeach
		</div>
	</div><!-- banner -->
	
			
	<section class="cat-sec new-block">
		<div class="container-fluid pd0">
			@foreach ( $category as $cate)
			<div class="cat-block">
				<div class="block-stl1 bg{{ $cate->cate_id }}">
					{!! $cate->cate_icon !!}
					<h5>{{ $cate->cate_name }}</h5>
				</div>
			</div>
			@endforeach
		</div>
	</section>

	<section class="special-offers-sec new-block">
		<div class="special-offer-inr-block new-block">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<p class="top-h">Thực Đơn Hôm Nay</p>
							<h2>Lễ Hội Giảm Giá</h2>
							<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
						</div>
					</div>
					<form action="" method="POST">
						@csrf
					<div class="col-lg-12">
						<div class="item-slider2 owl-carousel owl-theme">
							@foreach ($product_new as $item)
							<div class="item">
								<div class="block-stl2">
									<div style="height: 260px" class="img-holder">
										<img src="{{asset('public/upload/image/'.$item->pr_img)}}" alt="" class="img-responsive product-domnoo">
									</div>
									<div class="text-block">
										<h3>{{$item->pr_name}}</h3>
										<p class="price"><span>{{number_format($item->pr_price,0,',','.')}}VND</span> <del>@if($item->pr_pricenew==null) @else {{number_format($item->pr_price,0,',','.')}}VND @endif</del></p>
									</div>
									<div class="btn-sec">
										@if($item->pr_pizza==1)
										 <a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Thêm Vào Giỏ</a>
										@else
										<button style="color: aliceblue" type="button" data-id="{{$item->pr_id}}" name="add-cart" class="  add-cart btn1 stl2">Mua Ngay</button>
										<hr>
										<a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Xem Chi Tiết</a>
										@endif
									</div>
									<span class="nonveg veg-nonveg"></span>
								</div>
								<input type="hidden" value="{{$item->pr_id}}" class="cart_product_id_{{$item->pr_id}}">
								<input type="hidden" value="{{$item->pr_name}}" class="cart_product_name_{{$item->pr_id}}">
								<input type="hidden" value="{{$item->pr_img}}" class="cart_product_img_{{$item->pr_id}}">
								<input type="hidden" value="{{$item->pr_price}}" class="cart_product_price_{{$item->pr_id}}">
								<input type="hidden" value="0" class="cart_product_size_{{$item->pr_id}}">
								<input type="hidden" value="0" class="cart_product_base_{{$item->pr_id}}">
								<input type="hidden" value="0" class="cart_product_extra_{{$item->pr_id}}">
								<input type="hidden" value="0" class="cart_product_rim_{{$item->pr_id}}">
								<input type="hidden" value="1" class="cart_product_qty_{{$item->pr_id}}">
							</div>
							@endforeach
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</section>
	<section class="spl-offer new-block">
		<div class="container-fluid c-grid">
			<div class="row">
				<div class="grid1">
					<div class="block-stl3 stl1">
						<div class="fixed-bg" style="background: url('images/img6.jpg');"></div>
						<div class="img-holder">
							<img src="images/img6.png" alt="" class="img-responsive">
						</div>
						<div class="offer-block">
							<p class="top-h">Combo pizza</p>
							<h2>Combo pizza có gì hot ?</h2>
							<p>Hãy Bấm Link dưới đây để xem ngay.</p>
							<a href="{{asset('danh-muc-san-pham/7.html')}}" class="btn3">xem ngay</a>

						</div>
					</div>
					<div class="c-grid2">
						<div class="col1">
							<div class="block-stl3 stl3">
								<div class="img-holder">
									<img src="images/img7.png" alt="" class="img-responsive">
								</div>
								<div class="offer-block">
									<h2>Các đồ uống đi kèm</h2>
									<p>Liệu bạn đã khám phá đủ các món ăn nước của Domnoo chưa</p>
									<a href="{{asset('danh-muc-san-pham/3.html')}}" class="btn3">xem ngay</a>

								</div>
							</div>
						</div>
						<div class="col2">
							<div class="block-stl3 bg9 stl4">
								<div class="img-holder">
									<img src="images/img8.png" alt="" class="img-responsive">
								</div>
								<div class="offer-block">
									<h2>Gà rán</h2>
									<p>Với Sự Hòa quyện ngon tuyệt từ bột hãy bấm xem thử vị ngay</p>
									<a href="{{asset('danh-muc-san-pham/5.html')}}" class="btn3">xem ngay</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="grid2">
					<div class="block-stl3 stl2">
						<div class="fixed-bg" style="background: url('images/img9.jpg');"></div>
						<div class="img-holder">
							<img src="images/img9.png" alt="" class="img-responsive">
						</div>
						<div class="offer-block">
							<p class="top-h">Ngày cuối tuần</p>
							<h2>Giảm 30% khi bạn mua ngay combo của chúng tôi</h2>
							<a href="{{asset('danh-muc-san-pham/7.html')}}" class="btn3">xem ngay</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="deal-of-day new-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title">
						<p class="top-h">Mùa Lễ Hội</p>
						<h2>Săn deal ngay !!!</h2>
						<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
					</div>
				</div>
				<div class="col-lg-12 text-center">
					<div id="ofr_end"></div>
				</div>
				<form action="" method="POST">
					@csrf
				<div class="col-lg-12">
					<div class="item-slider2 owl-carousel owl-theme">
						@foreach ($product_deal as $item)
						<div class="item">
							<div class="block-stl2">
								<div style="height: 260px" class="img-holder">
									<img src="{{asset('public/upload/image/'.$item->pr_img)}}" alt="" class="img-responsive product-domnoo">
								</div>
								<div class="text-block">
									<h3>{{$item->pr_name}}</h3>
									<p class="price"><span>{{number_format($item->pr_price,0,',','.')}}VND</span> <del>@if($item->pr_pricenew==null) @else {{number_format($item->pr_price,0,',','.')}}VND @endif</del></p>
								</div>
								<div class="btn-sec">
									@if($item->pr_pizza==1)
									 <a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Thêm Vào Giỏ</a>
									@else
                                    <button style="color: aliceblue" type="button" data-id="{{$item->pr_id}}" name="add-cart" class="  add-cart btn1 stl2">Mua Ngay</button>
									<hr>
									<a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Xem Chi Tiết</a>
									@endif
								</div>
								<span class="nonveg veg-nonveg"></span>
							</div>
							<input type="hidden" value="{{$item->pr_id}}" class="cart_product_id_{{$item->pr_id}}">
							<input type="hidden" value="{{$item->pr_name}}" class="cart_product_name_{{$item->pr_id}}">
							<input type="hidden" value="{{$item->pr_img}}" class="cart_product_img_{{$item->pr_id}}">
							<input type="hidden" value="{{$item->pr_price}}" class="cart_product_price_{{$item->pr_id}}">
							<input type="hidden" value="0" class="cart_product_size_{{$item->pr_id}}">
							<input type="hidden" value="0" class="cart_product_base_{{$item->pr_id}}">
							<input type="hidden" value="0" class="cart_product_extra_{{$item->pr_id}}">
							<input type="hidden" value="0" class="cart_product_rim_{{$item->pr_id}}">
							<input type="hidden" value="1" class="cart_product_qty_{{$item->pr_id}}">
						</div>
						@endforeach
					</div>
				</div>
			</form>
			</div>
		</div>
	</section>
	<section class="amezing-offers new-block">
		<div class="overlay"></div>
		<div class="fixed-bg parallax" style="background: url('images/bg1.png');"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="img-holder">
						<img src="images/pz1.png" alt="" class="img-responsive">		
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="text-block-stl1">
						<div class="title">
							<p class="top-h">Thật tuyệt vời khi chúng ta mua ngay</p>
							<h2>50% off pizza online</h2>
							<a href="{{asset('/thuc-don')}}" class="btn1 stl2">Mua Ngay</a>
							<a href="#" class="btn1 stl1">Đọc Hướng Dẫn</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="this-month new-block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="title">
						<p class="top-h">Bữa tối tuyệt vời</p>
						<h2>Các món được nhiều người mua</h2>
						<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
					</div>
				</div>
				<form action="" method="POST">
					@csrf
				@foreach ($product_day as $item)
				<div class="col-lg-3 col-md-4 col-sm-6">
					<div class="block-stl2">
						<div style="height: 260px" class="img-holder">
							<img src="{{asset('public/upload/image/'.$item->pr_img)}}" alt="" class="img-responsive product-domnoo">
						</div>
						<div class="text-block">
							<h3>{{$item->pr_name}}</h3>
							<p class="price"><span>{{number_format($item->pr_price,0,',','.')}}VND</span> <del>@if($item->pr_pricenew==null) @else {{number_format($item->pr_price,0,',','.')}}VND @endif</del></p>
						</div>
						<div class="btn-sec">
							@if($item->pr_pizza==1)
									 <a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Thêm Vào Giỏ</a>
									@else
                                    <button style="color: aliceblue" type="button" data-id="{{$item->pr_id}}" name="add-cart" class="  add-cart btn1 stl2">Mua Ngay</button>
									<hr>
									<a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Xem Chi Tiết</a>
									@endif
						</div>
						<span class="nonveg veg-nonveg"></span>
					</div>
				</div>
				<input type="hidden" value="{{$item->pr_id}}" class="cart_product_id_{{$item->pr_id}}">
				<input type="hidden" value="{{$item->pr_name}}" class="cart_product_name_{{$item->pr_id}}">
				<input type="hidden" value="{{$item->pr_img}}" class="cart_product_img_{{$item->pr_id}}">
				<input type="hidden" value="{{$item->pr_price}}" class="cart_product_price_{{$item->pr_id}}">
				<input type="hidden" value="0" class="cart_product_size_{{$item->pr_id}}">
				<input type="hidden" value="0" class="cart_product_base_{{$item->pr_id}}">
				<input type="hidden" value="0" class="cart_product_extra_{{$item->pr_id}}">
				<input type="hidden" value="0" class="cart_product_rim_{{$item->pr_id}}">
				<input type="hidden" value="1" class="cart_product_qty_{{$item->pr_id}}">
				@endforeach
			    </form>
			</div>
		</div>
	</section>

	<section class="this-month-blog new-block">
		<div class="container-fluid no-gutter">
			<div class="row">
				<div class="col-lg-12">
					<div class="title">
						<p class="top-h">Trong Tháng Này</p>
						<h2>Bài Viết Mới</h2>
						<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="blog-slider1 owl-theme owl-carousel">
						@foreach ($blog as $item)
						<div class="item">
							<div class="blog-stl1">
								<div class="img-holder">
									<img  src="{{asset('public/upload/image/'.$item->bl_img1)}}" alt="" class="img-responsive blog-domnoo" />
									<div class="ovrl-block">
										<h3>{{ $item->bl_name }}</h3>
										<a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}" class="btn1 stl2">Đọc Thêm</a>
									</div>
									<ul class="blog-info-nav">
										<li><a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><i class="flaticon-profile"></i>{{$item->bl_author}}</a></li>
										<li><a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><i class="flaticon-calendar"></i>{{$item->created_at}}</a></li>
										<li><a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><i class="flaticon-calendar"></i>{{$item->bl_view}}</a></li>
									</ul>	
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
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
@endsection