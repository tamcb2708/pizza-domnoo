@extends('frontend-view')
@section('title', 'giỏ hàng')
@section('content')
    @if (Session::get('cart') == true)

        <section class="page-info new-block">
            <div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
            <div class="overlay"></div>
            <div class="container">
                <h2>Domnoo Restaurent</h2>
                <div class="clear-fix"></div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{ asset('/nguoi-dung/thanh-toan.html') }}">Thanh Toán</a>
                    </li>
                </ol>
            </div>
        </section><!-- banner -->
        <section class="shopping-cart new-block">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <hr>
                        <h3 style=" background-color: #bccff7">
                            <i>
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo '<span class="text-alert">' . $message . '</span>';
                                    Session::put('message', null);
                                }
                                ?>
                            </i>
                        </h3>
                        <div class="title">
                            <p class="top-h">Hóa Đơn</p>
                        </div>
                        <table class="table cart-tbl">
                            <thead>
                                <tr>
                                    <th class="p_dtl">Sản Phẩm</th>
                                    <th class="p_price">Giá Tiền</th>
                                    <td></td>
                                    <th class="p_ttl">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach (Session::get('cart') as $cart)
                                    @php
                                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td class="p_dtl">
                                            <img style="height: 60px; width:60px;  border-radius: 50%;"
                                                src="{{ asset('public/upload/image/' . $cart['product_img']) }}" alt=""
                                                class="img-responsive">
                                            <p>{{ $cart['product_name'] }}</p>
                                            <span style="font-size: 10px" class="ab-txt-block">
                                                @if ($cart['product_size'] == 1)
                                                    Cỡ 12 inch
                                                @elseif($cart['product_size']==2)
                                                    Cỡ 9 inch
                                                @elseif($cart['product_size']==3)
                                                    Cỡ 7 inch
                                                @endif
                                                @if ($cart['product_base'] == 1)
                                                    +
                                                    Đế Mỏng
                                                @elseif($cart['product_base']==2)
                                                    Đế Vừa
                                                @elseif($cart['product_base']==3)
                                                    Đé Dày
                                                @endif
                                                @if ($cart['product_extra'] == 1)
                                                    +
                                                    Thêm Phô Mai
                                                @elseif($cart['product_extra']==2)
                                                    +
                                                    Gấp Đôi Phô Mai
                                                @elseif($cart['product_extra']==3)
                                                    +
                                                    Gấp Ba Phô Mai
                                                @elseif($cart['product_extra']==0)

                                                @else
                                                    + Tùy Chọn Khác
                                                @endif

                                                @if ($cart['product_rim'] == 1)
                                                    +
                                                    {{-- {{$rim_next}} --}}
                                                    Viền Phô Mai
                                                @elseif($cart['product_rim']==2)
                                                    +
                                                    Viền Sô Cô La
                                                @elseif($cart['product_rim']==0)

                                                @else
                                                    + Có Viền Khác

                                                @endif
                                            </span>
                                        </td>
                                        <td class="p_price">
                                            <p>{{ number_format($cart['product_price'], 0, ',', '.') }}VND </p>
                                        </td>
                                        <td>
                                            <p style="color: rgb(196, 112, 11)"> x {{ $cart['product_qty'] }}</p>
                                        </td>
                                        <td class="p_ttl">
                                            {{ number_format($subtotal, 0, ',', '.') }}VND
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div class="block-stl10 odr-summary">
                            <ul class="list-unstyled">
                                @if (Session::get('coupon'))
                                    @foreach (Session::get('coupon') as $cou)
                                        @if ($cou['coupon_condition'] == 1)
                                            Mã Giảm :{{ $cou['coupon_number'] }} % giá trị giỏ hàng
                                            <p>
                                                @php
                                                    $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                    echo '<p style="background-color: #c1e6d4">Tổng tiền được giảm theo mã : ' . number_format($total_coupon, 0, ',', '.') . 'VND</p>';
                                                @endphp
                                            </p>
                                            <p>
                                                @php
                                                    $total_after_coupon = $total - $total_coupon;
                                                    echo '<p style="color: red">Tổng tiền được giảm : ' . number_format($total_after_coupon, 0, ',', '.') . 'VND</p>';
                                                @endphp
                                                </h3>
                                            @elseif($cou['coupon_condition']==0)
                                                Mã Giảm : {{ number_format($cou['coupon_number'], 0, ',', '.') }} VND;
                                            <p>
                                                @php
                                                    $total_coupon = $total - $cou['coupon_number'];
                                                    echo '<p>Tổng tiền được giảm theo mã khuyến mãi :' . number_format($total_coupon, 0, ',', '.') . 'VND</p>';
                                                @endphp
                                            </p>
                                            @php
                                                $total_after_coupon = $total_coupon;
                                                echo '<h3>Tổng tiền được giảm : ' . number_format($total_after_coupon, 0, ',', '.') . 'VND</p>';
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                            @if (Session::get('free'))
                                <hr>
                                <p>Phí Vận Chuyển:</p>
                                <p>{{ number_format(Session::get('free'), 0, ',', '.') }}VND</p>
                                <a href="{{ asset('cart/delete-free') }}"><i class="fa fa-trash-o"></i></a>
                                <?php $total_after_free = Session::get('free'); ?>
                            @endif
                            <div class="ttl-all">
                                <span class="ttlnm" style="color: red">Tổng Tiền Cần Thanh Toán: </span>
                                @php
                                    if (Session::get('free') && !Session::get('coupon')) {
                                        $total_after = $total + $total_after_free;
                                        echo number_format($total_after, 0, ',', '.') . 'VND';
                                    } elseif (!Session::get('free') && Session::get('coupon')) {
                                        $total_after = $total_after_coupon;
                                        echo number_format($total_after, 0, ',', '.') . 'VND';
                                    } elseif (Session::get('free') && Session::get('coupon')) {
                                        $total_after = $total_after_coupon;
                                        $total_after = $total_after + Session::get('free');
                                        echo number_format($total_after, 0, ',', '.') . 'VND';
                                    } elseif (!Session::get('free') && !Session::get('coupon')) {
                                        $total_after = $total;
                                        echo number_format($total_after, 0, ',', '.') . 'VND';
                                    }
                                @endphp
                            </div>
                            <div class="block-stl10">
                                <h3>Nhập Mã Giảm Giá :</h3>
                                <p>Hãy Tham Gia Các Chương Trình sự kiện của chúng tôi để được nhận code ..</p>
                                <form action="{{ asset('cart/check-coupon') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="coupon" class="form-control"
                                            placeholder="Nhập Mã..........">
                                    </div>
                                    <button class="check_coupon btn btn5">Chọn</button>
                                    @if (Session::get('coupon'))
                                        <a style="background-color: red" href="{{ asset('cart/delete-coupon') }}"
                                            class="btn1 stl3">Xóa Mã Khuyến Mãi</a>
                                    @endif
                                    <hr>
                                    @if (Session::get('free'))
                                        <a style="background-color: red" href="{{ asset('nguoi-dung/delete-free') }}"
                                            class="btn1 stl3">Xóa Phí Vận Chuyển</a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <hr>
                        <div class="title">
                            <p class="top-h">Thông Tin Người Nhận</p>
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {!! session()->get('message') !!}
                                </div>
                            @else(session()->has('error'))
                                <div class="alert alert-success ">
                                    {!! session()->get('error') !!}
                                </div>
                            @endif
                        </div>
                        <form method="POST">
                            @csrf
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                {{-- <h2 style="background-color: antiquewhite">Chọn Thành Phố</h2> --}}
                                <div style="height: 100px" class="form-group">
                                    <input type="text" readonly name="" value="Chọn Địa Chỉ Nhận Hàng( Bắt Buộc)"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div style="height: 100px; width:100%" class="col-md-4">
                                    <div style="height: 100px" class="form-group">
                                        <select name="city" id="city"
                                            class="form-control input-sm m-bot15 choose city">
                                            <option value=""></option>
                                            @foreach ($city as $ci)
                                                <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div style="height: 100px; width:100%" class="col-md-4">
                                    <div style="height: 100px" class="form-group">
                                        <select name="province" id="province"
                                            class="form-control input-sm m-bot15 province choose">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div style="height: 100px; width:100%" class="col-md-4">
                                    <div style="height: 100px" class="form-group">
                                        <select name="wards" id="wards"
                                            class="form-control input-sm m-bot15  wards">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12 col-md-12 text-center">
                                <input type="button" value="Tính Phí Vận Chuyển" name="calculate_order" id="btn"
                                    class="calculate_delivery btn btn3" style="color: aliceblue">
                            </div>
                            @csrf
                        </form>
                        <form>
                            <hr>
                            @csrf
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                <span class="ttlnm" style="color: red">Điền tên người nhận*</span>
                                <div style="height: 100px" class="form-group">
                                    <input required style="height: 50px; width:100%" type="text" value="{{ old('name') }}"
                                        name="shipping_name" placeholder="Họ và tên Người Nhận"
                                        class="shipping_name form-control">
                                </div>
                            </div>
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                <span class="ttlnm" style="color: red">Địa chỉ nhận hàng*</span>
                                <div style="height: 100px" class="form-group">
                                    <input required style="height: 50px; width:100%" type="text" value="{{ old('address') }}"
                                        name="shipping_address" placeholder="Địa Chỉ Nhận Hàng"
                                        class="shipping_address form-control">
                                </div>
                            </div>
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                <span class="ttlnm" style="color: red">Điện Thoại*</span>
                                <div style="height: 100px" class="form-group">
                                    <input required style="height: 50px; width:100%" type="text" value="{{ old('phone') }}"
                                        name="shipping_phone" placeholder="Điện Thoại Người Nhận"
                                        class="shipping_phone form-control">
                                </div>
                            </div>
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                <span class="ttlnm" style="color: red">Ghi Chú</span>
                                <div style="height: 100px" class="form-group">
                                    <textarea required style="height: 80%; width:100%"
                                        name="shipping_note" class="shipping_note form-control">
                                                    </textarea>
                                </div>
                            </div>
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                <span class="ttlnm" style="color: red">Giá Giao Hàng( bắt buộc)</span>
                                <div class="form-group" style="height: 100px">
                                    @if (Session::get('free'))
                                        <input type="text" readonly name="order_free" class="form-control order_free"
                                            value="{{ Session::get('free') }}">
                                    @else
                                        <input type="text" readonly name="" value="Tính Phí Ship Để Xem Giá Ship của Ban"
                                            class="form-control">
                                    @endif
                                    @if (Session::get('coupon'))
                                        @foreach (Session::get('coupon') as $cou)
                                            <input type="hidden" name="order_coupon"
                                                class="order_coupon
                                        "
                                                value="{{ $cou['coupon_code'] }}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="No">
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div style="height: 100px; width:100%" class="col-lg-12 col-md-12">
                                <h5 style="background-color: antiquewhite">Chọn Phương Thức Thanh Toán</h5>
                                <div style="height: 100px" class="form-group">
                                    <div class="col-md-5">
                                        <select name="shipping_method" class="shipping_method" id="gender shipping_method" onchange="genderChanged(this)">
                                            <option value="">Chọn Hình Thức</option>
                                            <option value="0">Chuyển Khoản Ngân Hàng</option>
                                            <option value="1">Nhận Hàng Rồi Thanh Toán</option>
                                        </select>
                                    </div>
                                    @php
                                         $vnd_to_usd = $total_after/22730   
                                    @endphp
                                    <input type="hidden" id="vnd_to_usd" name="vnd_to_usd" value="{{ round($vnd_to_usd) }}">
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="row">                     
                                    <div style="display: none" id="paypal-button"></div>
                                    <input style="display: none" type="button" class="send_order_detail btn btn3" name="send_order"
                                        value="Gửi" style="color: aliceblue">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>{{-- body --}}
    @else
        <!--error section area start-->
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
                                <h2>Pizza Cảm Ơn Bạn Vừa Thanh Toán Cho Chúng Tôi</h2>
                            </div>
                            <p>Pizza hiện đại ra đời vào năm 1889 khi nữ hoàng Margherita Teresa Giovanni, hoàng hậu của vua
                                Umberto I của Ý đến thăm Napoli. Raffaele Esposito, chủ quán rượu Pietro Il Pizzaiolo, đã
                                được yêu cầu chuẩn bị làm một món ăn đặc biệt để đón tiếp hoàng hậu. Esposito đã làm một
                                chiếc bánh pizza với cà chua, phó mát mozzarella (một loại phó mát được làm từ sữa trâu) và
                                húng quế, những thành phần đã tạo nên ba màu đỏ, trắng và xanh lá cây tượng trưng cho quốc
                                kì Ý. Ông đã đặt tên cho chiếc pizza đó là Margherita. Sau đó, người Ý ở các vùng khác đã
                                nghĩ ra các loại nhân khác nhau và sáng tạo nên những loại bánh pizza mang đặc trưng riêng
                                của từng vùng. </p>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </li>
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
        <!--pos page end-->
    @endif
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
@stop
