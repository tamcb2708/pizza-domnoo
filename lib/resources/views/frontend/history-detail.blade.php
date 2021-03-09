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
                <div  >
                    <h4 style="background-color: burlywood">Thông tin Vận Chuyển</h4>
                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                        <thead>
                             <tr class="">
                            <th>Người Nhận</th>
                            <th>Địa Chỉ</th>
                            <th>Phone</th>
                            <th>Phương Thức</th>
                            <th>Ngày Ship</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td style="color: red">{{$shipping->ship_name}}</td>
                                <td style="color: blue">{{$shipping->ship_address}}</td>
                                <td>{{$shipping->ship_phone}}</td>
                                <td>
                                    @if($shipping->ship_paymment==0)
                                Nhận Hàng Rồi Thanh Toán
                                 @else
                                Thanh Toán Chuyển Khoản
                              @endif
                          </td>
                                <td>{{$shipping->created_at}}</td>
                            </tr>
                        </tbody>                                     
                    </table>
                </div>
                <hr>
                <div  >
                    <h4 style="background-color: burlywood">Danh Sách Sản Phẩm Đã Đặt</h4>
                    <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                        <thead>
                             <tr class="">
                            <th>Số Thứ Tự</th>
                            <th>Mã Sản Phẩm</th>
                            <th>Ảnh Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                             @php
                                $i = 0;
                                $total = 0;
                                
                            @endphp
                        @foreach($order_details as $key =>$order)
                            @php
                                $i++ ;
                                $tongtien=$order->product_price * $order->product_quantity;
                                $total +=$tongtien ;

                            @endphp
                            <tr class="color_quanity_{{$order->product_id}}">
                                <td>{{$i}}</td>
                                <td style="color: red">{{$order->product_id}}</td>
                                <td>
                                    <img width="100px;" height="100px;" src="{{asset('public/Backend/SanPham/'.$order->product->pr_img)}}" alt="">
                                    @if($order->product_size==1)
                                             Cỡ 12 inch
                                          @elseif($order->product_size==2)
                                             Cỡ 9 inch
                                           @elseif($order->product_size==3)
                                             Cỡ 7 inch
                                    @endif
                                    @if($order->product_base==1)
                                            +
                                             Đế Mỏng
                                          @elseif($order->product_base==2)
                                             Đế Vừa
                                           @elseif($order->product_base==3)
                                             Đé Dày
                                    @endif

                                    @if($order->product_extra==1)
                                    +
                                    Thêm Phô Mai
                                 @elseif($order->product_extra==2)
                                    +
                                    Gấp Đôi Phô Mai
                                  @elseif($order->product_extra==3)
                                    +
                                    Gấp Ba Phô Mai
                                 @endif
                                 @if($order->product_rim)
                                    +
                                  Phô Mai
                              @else
                              @endif
                                </td>
                                <td><p>{{$order->product_name}} </p><hr><p style="color: red">x{{$order->product_quantity}} sản phẩm</p></td>
                                <td>{{number_format($order->product_price,0,',','.')}}VND</td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">

                                @php
                                    $total_coupon = 0;
                                @endphp
                                @if($coupon_condition==1)
                                    @php
                                        $total_after_coupon = ($total*$coupon_number)/100;
                                        echo 'Tổng giảm:'.number_format($total_after_coupon,0,',','.').'VND'.'</br>';
                                        $total_coupon=$total + $total_after_coupon + $order->product_freeship;
                                    @endphp
                                @else
                                    @php
                                        echo 'Tổng giảm:'.number_format($coupon_number,0,',','.').'VND'.'</br>';
                                        $total_coupon=$total-$coupon_number + $order->product_freeship;
                                    @endphp
                                @endif
                                Phí Ship: {{number_format($order->product_freeship,0,',','.')}}VND</br>
                                Tổng: {{number_format($total,0,',','.')}}VND </br>
                                Thanh Toán: <h4>{{number_format($total_coupon,0,',','.')}}VND</h4>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="10">
                                @if($order_status==1)
                                <a href="{{asset('nguoi-dung/order/delete/'.$order_code)}}" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng ?')" class="btn btn3"> <span class="glyphicon glyphicon-edit"></span>Hủy Đơn Hàng</a>     
                               @endif  
                            </td>
                        </tr>
                        </tbody>                                     
                    </table>
                    <!-- <a href="{{asset('admin/print-order'.$order->order_code)}}">In Don Hang</a> -->
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