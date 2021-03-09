@extends('frontend-view')
@section('title','giới thiệu')
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
		</section><!-- banner -->


		<section class="about-us-block new-block">
			<div class="container-fluid">
				<div class="row">
					<div class="col-custom1 pd0">
						<div class="img-holder">
							<img src="images/img12.jpg" alt="" class="img-responsive">
						</div>
					</div>
					<div class="col-custom2 pd0">
						<div class="fixed-bg">
							<img src="images/bg8.jpg" alt="" class="img-responsive">
						</div>
						<div class="block-stl12">
							<div class="title">
								<p class="top-h">Một Sự Thật Thú Vị</p>
								<h2>Pizza được ưa chuông</h2>
							</div>
							<p>Pizza hiện đại ra đời vào năm 1889 khi nữ hoàng Margherita Teresa Giovanni, hoàng hậu của vua Umberto I của Ý đến thăm Napoli. Raffaele Esposito, chủ quán rượu Pietro Il Pizzaiolo, đã được yêu cầu chuẩn bị làm một món ăn đặc biệt để đón tiếp hoàng hậu. Esposito đã làm một chiếc bánh pizza với cà chua, phó mát mozzarella (một loại phó mát được làm từ sữa trâu) và húng quế, những thành phần đã tạo nên ba màu đỏ, trắng và xanh lá cây tượng trưng cho quốc kì Ý. Ông đã đặt tên cho chiếc pizza đó là Margherita. Sau đó, người Ý ở các vùng khác đã nghĩ ra các loại nhân khác nhau và sáng tạo nên những loại bánh pizza mang đặc trưng riêng của từng vùng. </p>
							<ul class="list-unstyled">
								<li><i class="fas fa-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
								<li><i class="fas fa-check"></i> Auisque id arcu risus. In justo nunc</li>
								<li><i class="fas fa-check"></i> Maecenas finibus porta orci non tincidunt</li>
								<li><i class="fas fa-check"></i> Pellentesque sed consequat eros, sed sollicitudin</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</section>

		<section class="our-history new-block">
			<div class="fixed-bg parallax" style="background: url('images/bg9.jpg');"></div>
			<div class="overlay"></div>
			<div class="container-fluid pd0">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<p class="top-h">Bữa Ăn Ngon Cho Gia Đình Bạn</p>
							<h2>Lịch Sử Thương Hiệu</h2>
							<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
							<p class="bottom-p">Địa điểm làm và bán bánh pizza được gọi là pizzeria.
							<br>Các sự kiện diễn ra vào năm:</p>
						</div>
					</div>			
					<div class="col-lg-12">
						<div class="history_slider owl-carousel owl-theme">
							@foreach ($history as $item)
							<div class="item" >
								<div class="block-stl13" style="height: 300px">
									<div class="txt-container">
										<h3>{{$item->hi_time}}</h3>
										<p>{!!$item->hi_title!!} 
										</p>
										<a href="{{asset('gioi-thieu/gioi-thieu-chi-tiet/'.$item->hi_id.'.html')}}" class="btn1 stl2">Đọc Thêm</a>
									</div>
									<div class="img-holder">
										<img height="300px" src="{{asset('public/Backend/LichSu/'.$item->hi_img)}}" alt="" class="img-responsive">
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="meet-our-chef new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<p class="top-h">Nhân Viên Tiêu Biểu Của Chúng Tôi</p>
							{{-- <h2>meet our chef</h2> --}}
							<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
							<p class="bottom-p">Các nhân viên ưu tú nhất hệ mặt trời.
							<br>Các sản phẩm nhà hàng chúng tôi được tạo từ các nhân viên sau :</p>
						</div>
					</div>
					@foreach ($agent as $item)
						
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
						<div class="block-stl14">
							<div class="img-holder">
								<img src="{{asset('public/Backend/NhanVien/'.$item->ag_img)}}" alt="" class="img-responsive">
								<div class="overlay">
									<ul class="social-nav">
										<li><a href="{{$item->ag_facebook}}"><i class="flaticon-facebook-logo"></i></a></li>
										<li><a href="{{$item->ag_twitters}}"><i class="flaticon-twitter"></i></a></li>
										<li><a href="{{$item->ag_google}}"><i class="flaticon-google-plus-logo"></i></a></li>
										<li><a href="{{$item->ag_instar}}"><i class="flaticon-dribbble-logo"></i></a></li>
									</ul>
								</div>
							</div>
							<h5>{{$item->ag_name}}</h5>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>

		<section class="vid-sec new-block">
			<div class="fixed-bg parallax" style="background: url('images/bg10.jpg');"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="vid-block">
							<div class="img-holder">
								<img src="images/img26.jpg" alt="" class="img-responsive"> 
							</div>
							<div class="ovl">
								<h4>Một Chút Review Về Pizza Của Chúng Tôi Bởi TiToker Long Chun</h4>
								<a class="video" title="Why Us" href="https://www.youtube.com/watch?v=y4PY8t4TAU8">
									<i class="flaticon-video-player"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="gallery-sec new-block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="title">
							<p class="top-h">Một chút hình ảnh vui nhộn từ phía khách hàng</p>
							<h2>FeedBack của khách</h2>
							<div class="btm-style"><span><img src="images/btm-style.png" alt="" class="img-responsive"></span></div>
							<p class="bottom-p">Vui hơn khi chúng ta càng đông càng vui.
							{{-- <br>Curabitur erat turpis posuere ac ante at</p> --}}
						</div>
					</div>
					@foreach ($feedback as $item)
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="block-stl14 stl2">
							<div class="img-holder">
								<img src="{{asset('public/Backend/FeedBack/'.$item->fe_img)}}" alt="" class="img-responsive">
								<div class="overlay">
									<ul class="social-nav">
										<li><a href="images/big-img1.jpg" class="image-gal"><i class="flaticon-add"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					@endforeach
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