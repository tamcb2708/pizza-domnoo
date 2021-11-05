@extends('frontend-view')
@section('title','chi tiết sản phẩm')
@section('content')

		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2>Domnoo Restaurent</h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
				  <li class="breadcrumb-item active"><a href="{{asset('/thuc-don.html')}}">Thực Đơn</a></li>
				</ol>
			</div>
		</section><!-- banner -->

		<section class="about-product new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div style="height: 450px; width: 521px;"class="img-holder">
							<img style="height: 450px; width: 521px;" src="{{asset('public/upload/image/'.$item->pr_img)}}" alt="" class="img-responsive">
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="block-stl6">
							<h2>{{$item->pr_name}}<span class="veg veg-nonveg"></span></h2>
							<p class="price"><span>{{number_format($item->pr_price,0,',','.')}}VND</span> <del>@if($item->pr_pricenew==null) @else {{number_format($item->pr_price,0,',','.')}}VND @endif</del> </p>
							<p class="rating">
								@for($count=1;$count<=5;$count++)
								@php
                                    if($count<=$rating){
                                       $color= 'color:#f7d200;';
                                    }else{
                                           $color='color:#ccc;';
                                    }
                                @endphp
								<i style="cursor:pointer;{{$color}} font-size: 30px;" class="rating " title="Đánh giá sao" id="{{$item->pr_id}}-{{$count}}" data-index="{{$count}}" data-product_id="{{$item->pr_id}}" data-rating="{{$rating}}"> &#9733;</i>
								@endfor  
								<span>( {{$ra}} sao & {{$item->pr_view}} Lượt xem )</span>
							 </p>
							 <div class="col-md-12">
								<div class="col-md-4">
									<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="button" data-action="like" data-size="large" data-share="false"></div>
								 </div>
								 <div class="col-md-4">
									<div class="fb-save" data-uri="https://www.instagram.com/facebook/" data-size="large"></div>
								 </div>
								 <div class="col-md-4">
									<div class="fb-share-button" data-href="{{ $url_meta }}" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $url_meta }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
								 </div>
							 </div>
							 <div class="col-md-12">
								<form action="#" method="POST">
									@csrf
									<input type="hidden" value="{{$item->pr_id}}" class="cart_product_id_{{$item->pr_id}}">
									<input type="hidden" value="{{$item->pr_name}}" class="cart_product_name_{{$item->pr_id}}">
									<input type="hidden" value="{{$item->pr_img}}" class="cart_product_img_{{$item->pr_id}}">
									<input type="hidden" value="{{$item->pr_price}}" class="cart_product_price_{{$item->pr_id}}">
									<input type="hidden" value="{{$item->pr_price1}}" class="cart_product_price1_{{$item->pr_id}}">
									<input type="hidden" value="{{$item->pr_price2}}" class="cart_product_price2_{{$item->pr_id}}">
									<input type="hidden" value="{{$item->pr_price3}}" class="cart_product_price3_{{$item->pr_id}}">
									@if ($item->pr_pizza==1)
									<div class="form-block">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group"> 
													<label>Chọn Cỡ Bánh :</label>
													<select class="cart_product_size_{{$item->pr_id}} c_select">
														<option value="0">Mời Bạn Chọn Cỡ</option>
														<option value="1">Cỡ Lớn-12 inch thêm--{{$item->pr_price1}}K </option>
														<option value="2">Cỡ vừa-9 inch thêm--{{$item->pr_price2}}K </option>
														<option value="3">Cỡ nhỏ-7 inch thêm--{{$item->pr_price3}}K </option>
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Chọn Đế Bánh :</label>
													<select class="cart_product_base_{{$item->pr_id}} c_select">
														<option value="0">Mời Bạn Chọn Cỡ</option>
														<option value="1">Đế Mỏng</option>
														<option value="2">Đế Vừa</option>
														<option value="3">Đế Dày</option>
													</select>
												</div>
											</div>
											@foreach ($extra as $ex)
												<input type="hidden" value="{{$ex->ex_price}}" class="cart_extra_{{$ex->ex_id}}" data-ex-id="{{$ex->ex_id}}">
											@endforeach
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Tùy Chọn Thêm :</label>
													{{-- <input type="hidden" value="{{$item->ex_price}}" class="cart_product_extra_{{$item->ex_id}}"> --}}
													<select class="cart_product_extra_{{$item->pr_id}} c_select">
														<option value="0">Mời Bạn Chọn </option>
														@foreach ($extra as $extra)
														<option value="{{$extra->ex_id}}">{{$extra->ex_name}}....{{number_format($extra->ex_price,0,',','.')}}VND</option>
														@endforeach
													</select>
												</div>
											</div>
											@foreach ($rim as $ri)
												<input type="hidden" value="{{$ri->ri_price}}" class="cart_rim_{{$ri->ri_id}}" data-ri-id="{{$ri->ri_id}}">
											@endforeach
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Tùy Chọn Viền :</label>
													<select class="cart_product_rim_{{$item->pr_id}} c_select">
														<option value="0">Mời Bạn Chọn </option>
														@foreach ($rim as $rim)
														<option value="{{$rim->ri_id}}">{{$rim->ri_name}}....{{number_format($rim->ri_price,0,',','.')}}VND</option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group">
													<label>Số Lượng :</label>
													<input type="number" min="1" max="100" value="1" class="cart_product_qty_{{$item->pr_id}}">
												</div>
											</div>
											<hr>
											<div class="col-lg-6 col-md-6 col-sm-6">
												<div class="form-group btn-block">
													<button style="color: aliceblue" type="button" data-id="{{$item->pr_id}}" name="add-to-cart" class="  add-to-cart btn1 stl2">Thêm Vào Giỏ</button>
												</div>
											</div>
										</div>
									</div>
									@else	
										<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group">
											<label>Số Lượng :</label>
											<input type="number" min="1" max="100" value="1" class="cart_product_qty_{{$item->pr_id}}">
										</div>
									</div>
									<hr>
									<input type="hidden" value="0" class="cart_product_size_{{$item->pr_id}}">
									<input type="hidden" value="0" class="cart_product_base_{{$item->pr_id}}">
									<input type="hidden" value="0" class="cart_product_extra_{{$item->pr_id}}">
									<input type="hidden" value="0" class="cart_product_rim_{{$item->pr_id}}">
									<div class="col-lg-6 col-md-6 col-sm-6">
										<div class="form-group btn-block">
											<button style="color: aliceblue" type="button" data-id="{{$item->pr_id}}" name="add-cart" class="  add-cart btn1 stl2">Thêm Vào Giỏ</button>
										</div>
									</div>
									@endif
								</form>
							 </div>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>

		<div class="center-wrapper new-block">
			<div class="fixed-bg parallax" style="background: url('images/ptrn1.jpg');"></div>
			<div class="overlay"></div>
			<div class="inner-wrapper">
				<section class="about-product-block new-block">
					<div class="container col-md-6">
						<div class="block-stl7">
							<h4>Giới Thiệu :</h4>
							<p>{!!$item->pr_desc1!!}</p>
							<p>{!!$item->pr_desc2!!}</p>
							<p>{!!$item->pr_desc3!!}</p>
							<p>{!!$item->pr_more!!}</p>
						</div>
					</div>
					<div class="container col-md-6">
						<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5">
						</div>
					</div>
				</section>
				<section class="related-products new-block">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="title">
									<p class="top-h">Bữa Ăn Vui Vẻ</p>
									<h2>Các Sản Phẩm Liên Quan</h2>
									<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
								</div>
							</div>
							<div class="col-lg-12">
								<form action="" method="POST">
								<div class="item-slider2 owl-carousel owl-theme">
									@foreach ($items as $item)
									<div class="item">
										<div class="block-stl2">
						    				<div class="img-holder">
						    					<img src="{{asset('public/upload/image/'.$item->pr_img)}}" alt="" class="img-responsive">
						    				</div>
						    				<div class="text-block">
						    					<h3>{{$item->pr_name}}</h3>
						    					<p class="sz">{{$item->cate_name}}</p>
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
								</form>
							</div>
						</div>
					</div>
				</section>	
			</div>
		</div>
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