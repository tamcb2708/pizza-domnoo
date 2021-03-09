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
          <li class="breadcrumb-item active"><a href="{{asset('/nguoi-dung/lich-su.html')}}">Lịch Sử</a></li>
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
                    <?php
                                 $message=Session::get('message');
                                 if($message){
                                     echo '<h3 style="color:red;" class="text-alert">'.$message.'</h3>';
                                     Session::put('message',null);
                                 }       
                            ?>
                    <div class="title">
                        <p class="top-h">Danh Sách Đơn Hàng</p>
                        <div class="coron_table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ngày gửi</th>
                                        <th>Trạng thái</th>
                                        <th>Mã Đơn</th>
                                        <th>Function</th>	 	 	 	
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=0;
                                    @endphp
                                    @foreach($getorder as $order)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td><span class="success">
                                             @if($order->order_status==1)
                        <p style="background-color: #e6dc83">Đơn Hàng Đang Xử Lý</p>
                    @else
                        <p style="background-color: #807d6a">Đơn Hàng Đã Xử Lý</p>
                    @endif
                                        </span></td>
                                        <td>TTKTG{{$order->order_id}}{{$order->order_code}}</td>
                                        <td><a  href="{{asset('nguoi-dung/chi-tiet-lich-su/'.$order->order_code.'.html')}}" class="btn btn-danger">Xem</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pegination-block">
                        <ul class="pagination">
                            {{$getorder->links()}}
                        </ul>
                    </div>
                    {{-- <ul class="list-unstyled">
                        <li><i class="fas fa-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
                        <li><i class="fas fa-check"></i> Auisque id arcu risus. In justo nunc</li>
                        <li><i class="fas fa-check"></i> Maecenas finibus porta orci non tincidunt</li>
                        <li><i class="fas fa-check"></i> Pellentesque sed consequat eros, sed sollicitudin</li>
                    </ul> --}}
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