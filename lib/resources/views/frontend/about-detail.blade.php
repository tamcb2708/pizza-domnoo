@extends('frontend-view')
@section('title','chi tiết bài viết')
@section('content')
        <section class="page-info new-block">
            <div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
            <div class="overlay"></div>
            <div class="container">
                <h2>Domnoo Restaurent</h2>
                <div class="clear-fix"></div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{asset('/gioi-thieu.html')}}">Giới Thiệu</a></li>
                </ol>
            </div>
        </section>
        <!-- banner -->

        <section class="blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="bg-single">
                            <div class="bg-single-new">
                                <div class="image-holder">
                                    <div class="holder-new">
                                        <div class="overlay"></div>
                                        <img height="350px" src="{{asset('public/Backend/LichSu/'.$about->hi_img)}}" alt="">
                                    </div>
                                    <ul>
                                        <li><a href="#"><i class="flaticon-calendar"></i>{{$about->hi_time}}</a></li>
                                    </ul>
                                </div>
                                <div class="image-heading">
                                    <p>{!!$about->hi_desc1!!}</p>
                                    <p>{!!$about->hi_desc2!!}</p>
                                    <p>{!!$about->hi_desc3!!}</p>
                                    @if($about->hi_img==null)
                                    @else
                                    <div class="holder-new">
                                        <div class="overlay"></div>
                                        <img height="350px" src="{{asset('public/Backend/LichSu/'.$about->hi_img)}}" alt="">
                                    </div>
                                    @endif
                            
                                    <p>{!!$about->hi_desc4!!}</p>
                                </div>
                                <div class="image-heading2">
                                    <ul>
                                        <li><i class="flaticon-price-tag"></i></li>
                                        @foreach ($category as $item)
                                            
                                        <li><a href="{{asset('danh-muc-san-pham/'.$item->cate_id.'.html')}}">{{$item->cate_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--image-heading2-->
                        </div>
                        <div class="col-lg-12">
                            <div class="history_slider owl-carousel owl-theme">
                                @foreach ($about1 as $item)
                                <div class="item" >
                                    <div class="block-stl13" style="height: 300px">

                                        <div class="">
                                            <img height="150px" src="{{asset('public/Backend/LichSu/'.$item->hi_img)}}" alt="" class="">
                                            <p>{{$item->hi_time}}</p>
                                        </div>
                                        <hr>

                                        <div class="txt-container">
                                        
                                            <a href="{{asset('gioi-thieu/gioi-thieu-chi-tiet/'.$item->hi_id.'.html')}}" class="btn1 stl2">Đọc Ngay</a>
                                        </div>
                                   
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="about">
                            <div class="about-new">
                                <h2>Bài Viết Mới</h2>
                                @foreach ($blog1 as $item)
                                <div class="nws">
                                    <a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><h4>{!!$item->bl_name!!}</h4></a>
                                    <p>{{$item->created_at}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="about">
                            <h2>CATEGORIES</h2>
                            <ul>
                                <li><i class="flaticon-right-arrow"></i><a href="#">Baking steel</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="#">Scotts pizza journal</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="#">Pizza Therapy</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="#">Legends of Pizza</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="#">I Dream of Pizza</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="#">Pizza Tv</a></li>
                                <li><i class="flaticon-right-arrow"></i><a href="#">Bucks Pizza</a></li>
                            </ul>
                        </div> --}}

                        <div class="block_r">
                            <div class="block_r1">
                                <div class="overlay"></div>
                                <img src="images/pizzaaa.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <div class="content_container">
                                    <ul class="content_container_list">
                                        <li class="content_container_list_item">Giảm 10 % khi thanh toán chuyển khoản</li>
                                        <li class="content_container_list_item"> 50% OFF BURGER ONLINE</li>
                                        <li class="content_container_list_item">50% OFF SANDWICH ONLINE</li>
                                        <li class="content_container_list_item">50% OFF SANDWICH ONLINE</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tags">
                            <h2>TAGS</h2>
                            <div class="tags-line">
                                <ul>
                                    @foreach ($category1 as $item)
                                    <li><a href="{{asset('danh-muc-san-pham/'.$item->cate_id.'.html')}}">{{$item->cate_name}}</a></li>
                                    @endforeach
                                </ul>
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
						<div class="title">
							<p class="top-h">Trong tháng này</p>
							<h2><a style="color: black" href="{{asset('/bai-viet.html')}}">Xem ngay những bài viết mới</a></h2>
							<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
							<p class="bottom-p">Các Thương Hiệu Hợp Tác Chuyên Ngành</p>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="th-slider owl-theme owl-carousel">
							@foreach ($brand as $item)
						<div class="item">
							<div class="img-holder">
								<img src="{{asset('public/Backend/Brand/'.$item->bra_image)}}" alt="" class="img-responsive img1">
								<img src="{{asset('public/Backend/Brand/'.$item->bra_image)}}" alt="" class="img-responsive img2">
							</div>
						</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection