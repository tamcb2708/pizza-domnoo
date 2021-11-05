<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{!! $meta_description !!}">
    <meta name="keywords" content="{{ $meta_keywords }}">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="author" content="">

    <meta property="og:site_name" content="Domnno.com">
    <meta property="og:image" content="Domnno.com">
    <meta property="og:description" content="{!! $meta_description !!}">
    <meta property="og:keywords" content="{{ $meta_keywords }}">
    <meta property="og:title" content="{{ $meta_title }}">
    <meta property="og:url" content="{{ $url_meta }}">

    <meta property="og:type" content="website">
    <link rel="canonical" href="">
    <link rel="icon" href="images/fav2.ico" type="image/x-icon">
    <title>@yield('title') | pizza</title>
    <!-- Favicon -->
    <base href="{{ asset('public/frontend') }}/">
    <link rel="shortcut icon" href="images/fav2.ico" type="image/x-icon">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- main stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- color stylesheet -->
    <link rel="stylesheet" href="css/colors.css" id="ui-theme-color">
    <!-- responsive css -->
    <link href="Domnoo/domnoo.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css\sweetalert.css">
    <link   rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
        crossorigin="anonymous">
</head>

<body>
    <div class="loader_wrapper">
        <div class="loader">
            <img src="images/loader.gif" alt="" class="img-fluid">
        </div>
    </div>
    <!--// loader_wrapper -->

    <div id="wrapper">
        <header class="new-block main-header">
            <div class="main-nav new-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="logo">
                                <a href="{{ asset('/') }}"><img src="images/logo.png" alt="logo"
                                        class="img-responsive"></a>
                            </div>
                            <div class="location-block">
                                <p>Việt Nam</p>
                                <span>+0355 978 258</span>
                            </div>
                            <a class="nav-opener"><i class="fa fa-bars"></i></a>
                            <nav class="nav">
                                <ul class="list-unstyled">
                                    <li class="drop active"><a href="{{ asset('/') }}">Trang Chủ</a></li>

                                    <li class="drop"><a href="{{ asset('/thuc-don.html') }}">Menu</a></li>

                                    <li><a href="{{ asset('danh-muc-san-pham/1.html') }}">Pizza</a></li>

                                    <li><a href="{{ asset('/gioi-thieu.html') }}">Giới Thiệu</a></li>

                                    <li class="drop"><a href="{{ asset('/bai-viet.html') }}">Bài Viết</a>
                                    </li>

                                    <li><a href="{{ asset('/lien-he.html') }}">Liên Hệ</a></li>

                                    <?php $cus_id=Session::get('cus_id'); if($cus_id !=NULL){ ?>

                                    <li><a href="{{ asset('nguoi-dung/dang-xuat.html') }}">Đăng Xuất</a></li>

                                    <li><a href="{{ asset('nguoi-dung/tai-khoan.html') }}">Tài Khoản Và Lịch Sử</a>
                                    </li>

                                    <?php }else{ ?>

                                    <li><a href="{{ asset('nguoi-dung/dang-nhap.html') }}">Đăng Nhập</a></li>

                                    <?php } ?>
                                </ul>
                            </nav>
                            <div class="nav-right-block">
                                <ul class="list-unstyled">
								<ul class="list-unstyled"> 
                                <ul class="list-unstyled">
                                    <li>
                                        <?php $car = Session::get('cart'); ?>
                                        <?php if($car){  ?>
                                        @php
                                            $total = 0;
                                            $subtotal = 0;
                                        @endphp
                                        @foreach (Session::get('cart') as $cart)
                                            @php
                                                $subtotal = $cart['product_price'] * $cart['product_qty'];
                                                $total += $subtotal;
                                            @endphp
                                        @endforeach
                                        <a href="{{ asset('/cart/gio-hang.html') }}">
                                            <i class="flaticon-scooter-front-view"></i>
                                            <span class="nav-price">{{ number_format($total, 0, ',', '.') }}</span>
                                        </a>
                                        <?php }else{ ?>
                                        <a href="{{ asset('/cart/gio-hang.html') }}">
                                            <i class="flaticon-scooter-front-view"></i>
                                            <span class="nav-price"></span>
                                        </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div><!-- nav-login -->
                        </div>
                    </div>
                </div>
            </div>
        </header> <!-- header -->
        @yield('content')
        <footer class="main-footer new-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="footer-head">
                            <h3>Giới Thiệu Về Chúng Tôi :</h3>
                        </div>
                        <div class="footer-content">
                            <p>Domnoo được thành lập trong thời đại khủng khoảng kinh tế năm 1945, cho đến nay Domnoo đã
                                có trên 30 cơ sở...</p>
                            <a href="#" class="link">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <div class="footer-head">
                            <h3>Điều Khoản :</h3>
                        </div>
                        <div class="footer-content">
                            <ul class="list-unstyled">
                                <li><a href="{{ asset('huong-dan-mua-hang.html') }}">Hướng Dẫn Mua Hàng</a></li>
                                <li><a href="{{ asset('dieu-khoan.html') }}">Điều Khoản</a></li>
                                <li><a href="{{ asset('chinh-sach-khuyen-mai.html') }}">Chính Sách Khuyến Mãi</a></li>
                                <li><a href="{{ asset('huong-dan-su-dung.html') }}">Hướng Dẫn Sử Dụng</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="fb-page" data-href="https://www.facebook.com/Demnoo-Pizza-109848684055983"
                            data-tabs="timeline" data-width="400" data-height="300" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/Demnoo-Pizza-109848684055983"
                                class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/Demnoo-Pizza-109848684055983">Facebook</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copy-right">
            <div class="container">
                <p><a target="_blank" href="https://www.facebook.com/profile.php?id=100035884935308">Thông Tin Liên
                        Hê</a></p>
                <ul class="social-nav">
                    <li><a href="https://www.facebook.com/profile.php?id=100035884935308"><i
                                class="flaticon-facebook-logo"></i></a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=100035884935308"><i
                                class="flaticon-google-plus-logo"></i></a></li>
                </ul>
            </div>
        </div>
        <span id="go_to_top" class="go-to-top"><i class="flaticon-up-arrow"></i></span>
        <div class="theme-menu hide-sidebar">
            <h2>Chọn Theme Web</h2>
            <div id="style-switcher">
                <ul class="colors theme-btn">
                    <li data-path="css/colors.css" data-url="images">
					<li data-path="css/colors.css" data-url="images"> 
                    <li data-path="css/colors.css" data-url="images">
                        <p class="btn clr-style" style="background:#c10a28;"></p>
                    </li>
                    <li data-path="css/colors2.css" data-url="images/clr2">
                        <p class="btn clr-style" style="background:#f1b601;"></p>
                    </li>
                </ul>
            </div>
            <button class="btn btn-clr"><i class="fas fa-paint-brush"></i></button>
        </div>
    </div><!-- #wrapper -->
    <!-- include jQuery -->
    <script src="js/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.html"></script>
    <!-- bootstrap -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- slick slider  -->
    <script src="js/slick.js"></script>
    <!-- dscountdown  -->
    <script src="js/dscountdown.min.js"></script>
    <!-- jquery.nice-select -->
    <script src="js/jquery.nice-select.js"></script>
    <!-- magnific-popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Mixitup -->
    <script src="js/mixitup.min.js"></script>
    <!-- Google Map -->
    <script src="js/scripts.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP1lPhUhDU6MINpruPDinAzXffRlpzzFo"></script>
    <script src="js/map.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="js\sweetalert.min.js"></script>
    <script src="js\weetalert.js"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=1555549144784394&autoLogAppEvents=1"
        nonce="4sL6QdIA"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous">
    </script>
    <script>
        var usd = document.getElementById("vnd_to_usd").value;
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AaNXOhpMzjZEsjcfGn84mDtoteYeCv2XgJqe3nepZC4X5VOkGDEDZJRt_ZPcqz5_herdNjXAqidECGDg',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'large',
                color: 'blue',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: usd,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    window. swal("Cảm ơn",'Cảm ơn bạn đã mua hàng từ Domnoo');
                });
            }
        }, '#paypal-button');
    </script>

    <script type="text/javascript">
        function remove_background(product_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + product_id + '-' + count).css('color', '#ccc');
            }
        }
        $(document).on('mouseenter', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            remove_background(product_id);
            for (var count = 1; count <= index; count++) {
                $('#' + product_id + '-' + count).css('color', '#f7d200');
            }
        });
        $(document).on('mouleave', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var rating = $(this).data('rating');
            remove_background(product_id);
            for (var count = 1; count <= rating; count++) {
                $('#' + product_id + '-' + count).css('color', '#f7d200');
            }
        });
        $(document).on('click', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/insert-rating') }}',
                method: 'POST',
                data: {
                    index: index,
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    if (data == 'done') {
                        swal("Cảm ơn", "Bạn Đánh Giá" + index + "Trên 5");
                    } else {
                        swal("Lỗi Đánh Giá");

                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#sort').on('change', function() {
                var url = $(this).val();
                if (url) {
                    window.location = url;
                }
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.send_order_detail').click(function() {
                var shipping_method = $('.shipping_method').val();
                var shipping_name = $('.shipping_name').val();
                var shipping_address = $('.shipping_address').val();
                var shipping_phone = $('.shipping_phone').val();
                var shipping_note = $('.shipping_note').val();
                if(!shipping_name || !shipping_address || !shipping_phone || !shipping_note){
                    swal("Lỗi", "Mời Bạn Điền Đầy Đủ Thông Tin !!!)", "error");
                }else{
                    swal({
                        title: "Xác Nhận Đơn Hàng",
                        text: "Đơn Hàng Sẽ Không Được Hoàn Trả Sau Khi Đặt, Bạn Có Muốn Đặt Không ?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Tôi Đồng !",
                        cancelButtonText: "Không, Tôi Muốn Mua Thêm  !",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {

                        if (isConfirm) {
                            var order_free = $('.order_free').val();
                            var order_coupon = $('.order_coupon').val();
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: '{{ url('/nguoi-dung/confirm-order') }}',
                                method: 'POST',
                                data: {
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_note: shipping_note,
                                    order_free: order_free,
                                    order_coupon: order_coupon,
                                    _token: _token,
                                    shipping_method: shipping_method
                                },
                                success: function() {
                                    swal("Thông Tin Đơn ",
                                        "Đơn Hàng Của Bạn Đã Được Gửi Thành Công.",
                                        "success");

                                },
                                error: function () {
                                    swal("Lỗi", "Không Thể Xác Thực Với Email/ Máy Chủ !!!)", "error");
                                 }
                            });
                        } else {
                            swal("Lỗi", "Đơn Hàng Của Bạn Chưa Được Gửi !!!)", "error");
                        }
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var $result = '';
                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ url('/nguoi-dung/select-delivery.html') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' & maqh == '' & xaid == '') {
                    swal("Lỗi",'Làm Ơn Chọn Địa Chỉ Chính XÁc');
                } else {
                    $.ajax({
                        url: '{{ url('/nguoi-dung/calculate-free') }}',
                        method: 'POST',
                        data: {
                            matp: matp,
                            maqh: maqh,
                            _token: _token,
                            xaid: xaid
                        },
                        success: function() {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
      <script type="text/javascript">
        $(document).ready(function() {
            $('.add-cart').click(function() {
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_img = $('.cart_product_img_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = 1;
                var cart_product_size = 0;
                var cart_product_base = 0;
                var cart_product_extra = 0;
                var cart_product_rim = 0;
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/cart/add-cart') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_img: cart_product_img,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        cart_product_size: cart_product_size,
                        cart_product_base: cart_product_base,
                        _token: _token,
                        cart_product_extra: cart_product_extra,
                        cart_product_rim: cart_product_rim
                    },
                    success: function(data) {
                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href =
                                    "{{ url('/cart/gio-hang.html') }}";
                            });
                    }
                });
            });
        });
    </script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_img = $('.cart_product_img_' + id).val();
                var cart_product_pri = $('.cart_product_price_' + id).val()
                var cart_product_price1 = $('.cart_product_price1_' + id).val();
                var cart_product_price2 = $('.cart_product_price2_' + id).val();
                var cart_product_price3 = $('.cart_product_price3_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var cart_product_size = $('.cart_product_size_' + id).val();
                var cart_product_base = $('.cart_product_base_' + id).val();
                var cart_product_extra = $('.cart_product_extra_' + id).val();
                var cart_product_rim = $('.cart_product_rim_' + id).val();
                var cart_extra = [$('.cart_extra_' + parseInt(cart_product_extra)).val()];
                var cart_rim = [$('.cart_rim_' + parseInt(cart_product_rim)).val()];
                var _token = $('input[name="_token"]').val();
                if (parseInt(cart_product_size) == 1 && parseInt(cart_product_extra) < 1 && parseInt(
                        cart_product_rim) < 1) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1);
                } else if (parseInt(cart_product_size) == 2 && parseInt(cart_product_extra) < 1 && parseInt(
                        cart_product_rim) < 1) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price2);
                } else if (parseInt(cart_product_size) == 3 && parseInt(cart_product_extra) < 1 && parseInt(
                        cart_product_rim) < 1) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price3);
                } else if (parseInt(cart_product_size) == 1 && parseInt(cart_product_extra) && parseInt(
                        cart_product_rim) < 1) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_extra);
                } else if (parseInt(cart_product_size) == 2 && parseInt(cart_product_extra) && parseInt(
                        cart_product_rim) < 1) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_extra);
                } else if (parseInt(cart_product_size) == 3 && parseInt(cart_product_extra) && parseInt(
                        cart_product_rim) < 1) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_extra);
                } else if (parseInt(cart_product_size) == 1 && parseInt(cart_product_extra) && parseInt(
                        cart_product_rim)) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_extra) + parseInt(cart_rim);
                } else if (parseInt(cart_product_size) == 2 && parseInt(cart_product_extra) && parseInt(
                        cart_product_rim)) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_extra) + parseInt(cart_rim);
                } else if (parseInt(cart_product_size) == 3 && parseInt(cart_product_extra) && parseInt(
                        cart_product_rim)) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_extra) + parseInt(cart_rim);
                } else if (parseInt(cart_product_size) == 1 && parseInt(cart_product_extra) < 1 && parseInt(
                        cart_product_rim)) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_rim);
                } else if (parseInt(cart_product_size) == 2 && parseInt(cart_product_extra) < 1 && parseInt(
                        cart_product_rim)) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_rim);
                } else if (parseInt(cart_product_size) == 3 && parseInt(cart_product_extra) < 1 && parseInt(
                        cart_product_rim)) {
                    var cart_product_price = parseInt(cart_product_pri) + parseInt(cart_product_price1) +
                        parseInt(cart_rim);
                }
                if (parseInt(cart_product_qty) > 9) {
                    swal("Lỗi",'Số Lượng Sản Phẩm Bạn Đặt Phải Nhỏ Hơn' + 9 + 'Sản Phẩm');
                } else if (parseInt(cart_product_size) < 1) {
                    swal("Lỗi",'Mời Bạn Chọn Cỡ Bánh');
                } else if (parseInt(cart_product_base) < 1) {
                    swal("Lỗi",'Mời bạn Chọn Đế Bánh');
                } else {
                    $.ajax({
                        url: '{{ url('/cart/add-cart') }}',
                        method: 'POST',
                        data: {
                            cart_product_id: cart_product_id,
                            cart_product_name: cart_product_name,
                            cart_product_img: cart_product_img,
                            cart_product_price: cart_product_price,
                            cart_product_qty: cart_product_qty,
                            cart_product_size: cart_product_size,
                            cart_product_base: cart_product_base,
                            _token: _token,
                            cart_product_extra: cart_product_extra,
                            cart_product_rim: cart_product_rim
                        },
                        success: function(data) {
                            swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href =
                                        "{{ url('/cart/gio-hang.html') }}";
                                });
                        }
                    });
                }
            });
        });
    </script>
    <script language="javascript">
        function genderChanged(obj)
        {
            var value = obj.value;
            if(value === '0'){
                $('#paypal-button').show();
                $('.send_order_detail').hide();
            }else if(value === '1'){
                $('#paypal-button').hide();
                $('.send_order_detail').show();
            }else{
                $('#paypal-button').hide();
                $('.send_order_detail').hide();
            }
        }

    </script>
</body>


</html>
