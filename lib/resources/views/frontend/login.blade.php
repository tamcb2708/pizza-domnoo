@extends('frontend-view')
@section('title', 'Đăng Nhập')
@section('content')
    <section class="page-info new-block">
        <div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
        <div class="overlay"></div>
        <div class="container">
            <h2>Domnoo Restaurent</h2>
            <div class="clear-fix"></div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset('/') }}">Trang Chủ</a></li>
                <li class="breadcrumb-item active"><a href="{{ asset('/nguoi-dung/dang-nhap.html') }}">Đăng Nhập</a></li>
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
                            <hr>
                            <p class="top-h">Một Sự Thật Thú Vị</p>
                        </div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {!! session()->get('message') !!}
                            </div>
                        @else(session()->has('error'))
                            <div class="alert alert-success">
                                {!! session()->get('error') !!}
                            </div>
                        @endif
                        @csrf
                        @foreach ($errors->all() as $val)
                            <ul>
                                <li>{{ $val }}</li>
                            </ul>

                        @endforeach
                        <form action="{{ asset('/nguoi-dung/check-dang-nhap.html') }}" method="POST">
                            @csrf
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                <h2 style="background-color: antiquewhite">Email</h2>
                                <div style="height: 100px" class="form-group">
                                    <input style="height: 50px; width:100%" type="email" value="{{ old('email') }}"
                                        name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>

                            <div style="height: 100px" class="col-lg-12 col-md-12">
                                <h2 style="background-color: antiquewhite">Mật Khẩu</h2>
                                <div style="height: 100px" class="form-group">
                                    <input style="height: 50px; width:100%" type="password" name="password"
                                        placeholder="Mật Khẩu" class="form-control">
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12 col-md-12 text-center">
                                <input type="submit" id="btn" class="btn btn3" value="Đăng Nhập"
                                    style="color: aliceblue">
                                <a class="btn btn-outline-white" style="font-size: 10px; color:black;"
                                    href="{{ asset('nguoi-dung/login-google.html') }}" role="button"
                                    style="text-transform:none">
                                    <img style="margin-bottom:3px; margin-right:5px; width:20px" alt="Google sign-in"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                    Đăng Nhập Bằng Google
                                </a>
                                <a class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with"
                                    data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"
                                    href="{{ asset('nguoi-dung/login-facebook.html') }}">
                                    Đăng Nhập Bằng FaceBook
                                </a>
                            </div>
                            <div class="col-md-12">
                                <a style="color: black;
                                    font-size: 15px;" class="btn btn6"
                                    href="{{ asset('nguoi-dung/mat-khau.html') }}">Quên Mật Khẩu</a>
                            </div>
                            <div class="col-md-12">
                                <a style="color: black;
                                font-size: 15px;" class="btn btn6"
                                    href="{{ asset('nguoi-dung/dang-ky.html') }}">Bạn Chưa Có Tài Khoản ?</a>
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
                                    <img src="{{ asset('public/upload/image/' . $item->bra_image) }}" alt=""
                                        class="img-responsive img1">
                                    <img src="{{ asset('public/upload/image/' . $item->bra_image) }}" alt=""
                                        class="img-responsive img2">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
