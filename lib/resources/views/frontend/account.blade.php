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
          <li class="breadcrumb-item active"><a href="{{asset('/nguoi-dung/tai-khoan.html')}}">Trang Cá Nhân</a></li>
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