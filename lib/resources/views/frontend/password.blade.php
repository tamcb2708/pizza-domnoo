@extends('frontend-view')
@section('title',' Mật Khẩu')
@section('content')
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
								<h2>Bạn Có Tài Khoản Nhưng Lại Quên Mật Khẩu</h2>
							</div>
							@if(session()->has('message'))
							<div class="alert alert-success">
							  {!!session()->get('message')!!}
							</div>
						@else(session()->has('error'))
							 <div class="alert alert-success">
							  {!!session()->get('error')!!}
							</div>
						@endif
						@csrf
						@foreach ($errors->all() as $val)
						<ul>
							<li>{{$val}}</li>
						</ul>
							
						@endforeach
							<form  action="{{asset('/nguoi-dung/luu-mat-khau.html')}}" method="POST">
                                @csrf
                                <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                    <h2 style="background-color: antiquewhite">Điền Mật Khẩu</h2>
                                    <div style="height: 100px" class="form-group">
                                        <input style="height: 50px; width:100%" type="password" value="{{old('password')}}" name="passwords" placeholder="password" class="form-control">
                                    </div>	
                                </div>
                                <input type="hidden" name="email" value="{{$email}}">
                                <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                    <h2 style="background-color: antiquewhite">Nhập Lại Mật Khẩu</h2>
                                    <div style="height: 100px" class="form-group">
                                        <input style="height: 50px; width:100%" type="password" value="{{old('password1')}}" name="password1" placeholder="password" class="form-control">
                                    </div>	
                                </div>
                                <hr>
                                <div class="col-lg-12 col-md-12 text-center">
                                    <input type="submit" id="btn" class="btn btn3" value="Lưu" style="color: aliceblue">
                                </div>
                            </form>
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