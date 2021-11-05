@extends('frontend-view')
@section('title','liên hệ')
@section('content')

		<section class="page-info new-block">
			<div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
			<div class="overlay"></div>
			<div class="container">
				<h2>Domnoo Restaurent</h2>
				<div class="clear-fix"></div>
				<ol class="breadcrumb">
				  <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
				  <li class="breadcrumb-item active"><a href="{{asset('/lien-he.html')}}">Liên Hệ</a></li>
				</ol>
			</div>
		</section><!-- banner -->
		<div id="map1"></div>
		<div class="center-wrapper cn-us new-block">
			<div class="fixed-bg parallax" style="background: url('images/ptrn1.jpg');"></div>
			<div class="overlay"></div>
			<div class="send-msg new-block">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="block-stl11">
								<i class="flaticon-placeholder"></i>
								<hr>
								<p>Ngõ-32 Phan-Văn-Trường Cầu-Giấy Hà-Nội</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="block-stl11">
								<i class="flaticon-phone-call"></i>
								<hr>
								<a style="color: black" href="tel:0355978258">+0355 978 258</a>
								<hr>
								<a style="color: black" href="tel:0355978258">+0355 978 258</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="block-stl11">
								<i class="flaticon-message"></i>
								<hr>
								<a style="color: black" href="mailto:tamcb2708@gmail.com">tamcb2708@gmail.com</a></li>
								<hr>
								<a style="color: black" href="mailto:domnoo@gmail.com">domnoo@gmail.com</a></li>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-block1">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="title">
								<h2>Liên Hệ Với Chúng Tôi</h2>
							</div>
						</div>
						<div class="clearfix"></div>
						<?php $message=Session::get('message');	if($message){
							echo '<h2 style="color:red;" class="text-alert">'.$message.'</h2>';
							Session::put('message',null); } ?>
						<form action="{{asset('gui-lien-he')}}" method="POST">
							@csrf
							@foreach ($errors->all() as $val)
							<ul>
								<li>{{$val}}</li>
							</ul>
							@endforeach
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<input required type="text" name="name" value="{{old('name')}}" placeholder="Họ Và Tên" class="form-control">
								</div>	
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input required type="text" name="phone" value="{{old('phone')}}" placeholder="Số Điện Thoại" class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input required type="text" name="email" value="{{old('email')}}" placeholder="Email" class="form-control">
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<textarea required class="form-control" name="desc" value="{{old('desc')}}" placeholder="Write your messages.."></textarea>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 text-center">
								<input type="submit" id="btn" class="btn btn3" value="Send message">
							</div>
						</form>
					</div>
				</div>
			</div>		
		</div>
@endsection

