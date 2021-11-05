@extends('frontend-view')
@section('title','thực đơn')
@section('content')   
		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2>Domnoo Restaurent</h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
				  <li class="breadcrumb-item active"><a href="{{asset('thuc-don.html')}}">Menu</a></li>
				</ol>
			</div>
		</section><!-- banner -->
		
				
		<section class="domnoo-menu-filter2 list-grid-sec new-block">
			<div class="fixed-bg parallax" style="background-image: url(images/ptrn1.jpg);"></div>
			<div class="overlay"></div>
			<div class="col1">
				<div class="filters">
					<ul class="button-group tab-flr-btn">
                        @foreach ($category as $item)
						<li data-filter=".pizza" class="btn-flr is-checked tab-flr-btn-btn-flr-active">
                            <a href="{{asset('danh-muc-san-pham/'.$item->cate_id.'.html')}}">
                                <div class="cat-block">
									<div class="block-stl1 bg{{ $item->cate_id }}">
                                        {!! $item->cate_icon !!}
                                        <h4>{{$item->cate_name}}</h4>
                                    </div>
                                </div>
                            </a>  
						</li>
                        @endforeach
					</ul>

					<div class="filter-tabnav">
						<div class="container">
							<p class="showing-result">Showing 1 - 8 </p>
							<span class="sort-by"> Short by :</span>
							<ul class="button-group js-radio-button-group" data-filter-group="item_cat_inner">
								<li class="sort-domnoo">
									<select name="sort" id="sort" class="form-control">
										<option value="{{Request::url()}}?sort_by=none">Lọc</option>
										<option value="{{Request::url()}}?sort_by=tang_dan">Giá Tăng Dần</option>
										<option value="{{Request::url()}}?sort_by=giam_dan">Giá Giảm Dần</option>
										<option value="{{Request::url()}}?sort_by=kytu_az">Từ A Đến Z</option>
										<option value="{{Request::url()}}?sort_by=kytu_za">Từ Z Đến a</option>
										<option value="{{Request::url()}}?sort_by=cu_nhat">Cũ Nhất</option>
										<option value="{{Request::url()}}?sort_by=moi_nhat">Mới Nhất</option>
									</select>
								</li>
							</ul>
							<div class="list-grid-btns">
						    	<button class="btn grid-btn"><i class="flaticon-menu"></i></button>
						    	<button class="btn active list-btn"><i class="flaticon-grid"></i></button>
						    </div>
						</div>
					</div>
				</div>
			</div>

			<div class="col2">
				<div class="grid" id="grid">
			@foreach ($product as $item)  
				<form action="" method="POST">
					@csrf
                    <div class="items-for-flr pizza" data-newest="1" data-popularity="5" data-price="6.00">                   
                        <div class="block-stl2 ">
                            <div class="img-holder">
                                <img src="{{asset('public/upload/image/'.$item->pr_img)}}" alt="" class="img-responsive product-domnoo">
                            </div>
                            <div class="text-block">
                                <h3>{{$item->pr_name}}</h3>
                                <p class="sz">Thuộc Danh Mục: {{$item->cate_name}}</p>
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
                        <div class="block-stl2_dsn2 md2">
                            <div class="img-holder">
                                <img  src="{{asset('public/upload/image/'.$item->pr_img)}}" alt="" class="img-responsive product-domnoo">
                            </div>
                            <div class="text-block">
                                <h3>{{$item->pr_name}}</h3>
                                <p class="sz">Thuộc Danh Mục: {{$item->cate_name}}</p>
                                <p class="ab-it">{!!$item->pr_element!!}</p>
                                <p class="price"><span>{{number_format($item->pr_price,0,',','.')}}VND</span> <del>@if($item->pr_pricenew==null) @else {{number_format($item->pr_price,0,',','.')}}VND @endif</del></p>
                                <div class="btn-sec">
									@if($item->pr_pizza==1)
									 <a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Thêm Vào Giỏ</a>
									@else
                                    <button style="color: #c10a28" type="button" data-id="{{$item->pr_id}}" name="add-cart" class="add-cart btn4 stl2">Mua Ngay</button>
									<hr>
									<a href="{{asset('thuc-don/chi-tiet-san-pham/'.$item->pr_id.'.html')}}" class="btn4">Xem Chi Tiết</a>
									@endif
                                </div>
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

				</form>
				@endforeach
                </div>
			</div>	
			<div class="clearfix"></div>
			<div class="container text-center">
				<div class="pegination-block">
					<ul class="pagination">
						{{$product->links()}}
					</ul>
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
								<p class="top-h">amazing offers online</p>
								<h2>50% off pizzas online</h2>
								<p class="bottom-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ornare placerat tellus sit amet ullamcorper.</p>
								<a href="#" class="btn1 stl2">buy now</a>
								<a href="#" class="btn1 stl1">about more</a>
							</div>
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