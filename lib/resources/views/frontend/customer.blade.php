@extends('frontend-view')
@section('title','Tài Khoản')
@section('content')
<section class="page-info new-block">
    <div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
    <div class="overlay"></div>
    <div class="container">
        <h2>Domnoo Restaurent</h2>
        <div class="clear-fix"></div>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
          <li class="breadcrumb-item active"><a href="{{asset('/nguoi-dung/thong-tin.html')}}">Thông Tin Tài Khoản</a></li>
        </ol>
    </div>
</section><!-- banner -->
<section class="domnoo-menu-filter list-grid-sec new-block">
    <div class="fixed-bg parallax" style="background-image: url(images/ptrn1.jpg);"></div>
    <div class="overlay"></div>
    <div class="filters">
        <ul class="button-group tab-flr-btn">
            <li data-filter=".pizza" class="btn-flr is-checked">
                <a href="{{asset('/nguoi-dung/tai-khoan.html')}}">
                    <div class="cat-block">
                        <div class="block-stl1 bg1">
                            <span class="flaticon-pizza"></span>
                            <h4>Trang Cá Nhân</h4>
                        </div>
                    </div>
                </a>
            </li>
            <li data-filter=".burgers" class="btn-flr">
                <a href="{{asset('/nguoi-dung/lich-su.html')}}">
                    <div class="cat-block">
                        <div class="block-stl1 bg1">
                            <span class="flaticon-burger"></span>
                            <h4>Đơn Hàng Và Lịch Sử Mua Hàng</h4>
                        </div>
                    </div>
                </a>
            </li>
            <li data-filter=".burgers" class="btn-flr">
                <a href="{{asset('/nguoi-dung/thong-tin.html')}}">
                    <div class="cat-block">
                        <div class="block-stl1 bg1">
                            <span class="flaticon-salad"></span>
                            <h4>Thông Tin Cá Nhân</h4>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</section>
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
                        <p class="top-h">Thông Tin Cá Nhân</p>
                    </div>
                    <hr>
                    <form action="{{asset('nguoi-dung/luu.html')}}" method="POST">
                        @foreach ($errors->all() as $val)
                            <ul>
                                <li>{{$val}}</li>
                            </ul>
                        @endforeach
                        @csrf
                        <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                            <h2 style="background-color: antiquewhite">Họ và tên</h2>
                            <div style="height: 100px" class="form-group">
                                <input style="height: 50px; width:100%" type="text" value="{{$customer->cus_name}} autofocus" name="acc_name" placeholder="Họ và tên" class="form-control">
                            </div>	
                        </div>
                        <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                            <h2 style="background-color: antiquewhite">Email</h2>
                            <div style="height: 100px" class="form-group">
                                <input style="height: 50px; width:100%" type="email" readonly value="{{$customer->cus_email}}" name="acc_email" placeholder="Địa Chỉ Email" class="form-control">
                            </div>	
                        </div>
                        <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                            <h2 style="background-color: antiquewhite">Địa chỉ</h2>
                            <div style="height: 100px" class="form-group">
                                <input style="height: 50px; width:100%" type="text" value="{{$customer->cus_address}}" name="acc_address" placeholder="Địa Chỉ" class="form-control">
                            </div>	
                        </div>
                        <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                            <h2 style="background-color: antiquewhite">Số điện thoại</h2>
                            <div style="height: 100px" class="form-group">
                                <input style="height: 50px; width:100%" type="text" value="{{$customer->cus_phone}}" name="acc_phone" placeholder="Số Điện Thoại" class="form-control">
                            </div>	
                        </div>
                        <div style="height: 100px" class="col-lg-12 col-md-12">
                            <h2 style="background-color: antiquewhite">Mật Khẩu</h2>
                            <div style="height: 100px" class="form-group">
                                <input style="height: 50px; width:100%" type="password" value="{{$customer->cus_password}}" name="acc_password" placeholder="Mật Khẩu" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12 col-md-12 text-center">
                            <input type="submit" id="btn" class="btn btn3" value="Lưu Thông Tin" style="color: aliceblue">
                        </div>
                    </form>
                    <hr>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check"></i>  </li>
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
@stop