<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{asset('public/backend')}}/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('tit')</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('admin/home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Domnoo Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{asset('admin/home')}}">
                    <i class="fa fa-home fa-fw"></i>
                    <span>Trang Chủ</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">         
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Quản Lý Danh Mục</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{asset('admin/cate')}}">Danh Mục Bài Viết</a>
                        <a class="collapse-item" href="{{asset('admin/category')}}">Danh Mục Sản Phẩm</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/order')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Danh Sách Đơn Đặt Hàng</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản Lý Sản Phẩm</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sản Phẩm Và Các Tùy Chọn:</h6>
                        <a class="collapse-item" href="{{asset('admin/product')}}">Sản Phẩm</a>
                        <a class="collapse-item" href="{{asset('admin/rim')}}">Tùy Chọn Viền Pizza</a>
                        <a class="collapse-item" href="{{asset('admin/extra')}}">Tùy Chọn Thêm Của Pizza</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/delivery')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Tính Phí Ship</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/coupon')}}">
                    <i class="fa fa-book fa-fw"></i>
                    <span>Mã Giảm Giá</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/contact')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Liên Hệ Của Khách</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/slide')}}">
                    <i class="fa fa-book fa-fw"></i>
                    <span>Quản Lý Slide</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/feedback')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>FeedBack Của Khách</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/blog')}}">
                    <i class="fa fa-book fa-fw"></i>
                    <span>Bài Viết </span></a>
            </li>
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/history')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Bài Viết Về Lịch Sử</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/agent')}}">
                    <i class="fa fa-book fa-fw"></i>
                    <span>Nhân Viên</span></a>
            </li>
            @impersonate
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/user/impersonate-detroy')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span style="background:coral;">Dừng Chuyển Quyền</span></a>
            </li>
            @endimpersonate
            @hasrole(['admin','author'])
            <li class="nav-item">
                <a class="nav-link" href="{{asset('admin/user')}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tài Khoản</span></a>
            </li>
            @endhasrole
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form method="get" role="search" action="{{asset('admin/search')}}"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Nhập Tên Sản Phẩm..."
                                aria-label="Search" aria-describedby="basic-addon2"  name="result">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                                    
                                     <?php
                                     $name=Auth::user()->ad_name;
                                     if($name){
                                         echo $name;
                                     }   
                                     ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

    @yield('master')      

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn Có Chắc Chắn Thoát không ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Khi Bạn Thoát Bạn Sẽ Không Thể Xem Được Thông Tin Từ Trang Admin...</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    {{-- <a class="btn btn-primary" href="{{asset('admin/logout')}}">Logout</a> --}}
                    <a class="btn btn-primary" href="{{asset('admin/logout-auth')}}">Thoát Ngay</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/jquery.unobtrusive-ajax.js"></script>
    <script src="js/jquery.unobtrusive-ajax.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script type="text/javascript" src="../editor/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            fetch_delivery();
            function fetch_delivery(){
                var _token=$('input[name="_token"]').val();
                $.ajax({
                    url: '{{url('/admin/delivery/select-freeship')}}',
                    method: 'POST',
                    data: { _token:_token},
                    success:function(data){
                        $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur','.free_ship_edit',function(){
                var fre_ship_id=$(this).data('freeship_id');
                var fre_ship_value=$(this).text();
                var _token=$('input[name="_token"]').val();
                // alert(fre_ship_id);
                // alert(fre_ship_value);
                 $.ajax({
                    url: '{{url('/admin/delivery/update-delivery')}}',
                    method: 'POST',
                    data: {fre_ship_id:fre_ship_id, fre_ship_value:fre_ship_value,_token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
    
            });
            $('.add_delivery').click(function(){
                var city=$('.city').val();
                var province= $('.province').val();
                var wards= $('.wards').val();
                var fre_ship=$('.fre_ship').val();
                var _token=$('input[name="_token"]').val();
                // alert(city);
                // alert(province);
                // alert(wards);
                // alert(fre_ship);
                 $.ajax({
                    url: '{{url('/admin/delivery/insert-delivery')}}',
                    method: 'POST',
                    data: {city:city, province:province, _token:_token, wards:wards, fre_ship:fre_ship},
                    success:function(data){
                        fetch_delivery();
                    }
                });
    
    
           });
    
            $('.choose').on('change',function(){
                var action=$(this).attr('id');
                var ma_id=$(this).val();
                var _token=$('input[name="_token"]').val();
                var $result='';
    
                if(action=='city'){
                    result='province';
                }else{
                    result='wards';
                }
                $.ajax({
                    url: '{{url('/admin/delivery/select-delivery')}}',
                    method: 'POST',
                    data: {action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $( function(){
           $("#datepicker").datepicker({
               dateFormat:"yy-mm-dd",
               duration:"slow",
   
           });
           $("#datepicker2").datepicker({
               dateFormat:"yy-mm-dd",
               duration:"slow",
           });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
         chart30daysorder();
         var chart =  new Morris.Line({
     // ID of the element in which to draw the chart.
     element: 'myfirstchart',
     lineColors: ['#1a48f0','#1af03e','#f0891a','#731af0','#e3a3a3'],
     parseTime:false,
     hideHover:'auto',
     // Chart data records -- each entry in this array corresponds to a point on
     // the chart.
     // data: [
     //   { year: '2008', value: 20 },
     //   { year: '2009', value: 10 },
     //   { year: '2010', value: 5 },
     //   { year: '2011', value: 5 },
     //   { year: '2012', value: 20 }
     // ],
     // The name of the data record attribute that contains x-values.
     xkey: 'period',
     // A list of names of data record attributes that contain y-values.
     ykeys: ['order','sales','profit','quantity'],
     // Labels for the ykeys -- will be displayed when you hover over the
     // chart.
     labels: ['Đơn Hàng','Doanh Thu','Lợi Nhuận','Số Lượng']
   });
           $('.dashboard-filter').change(function(){
             var dashboard_value=$(this).val();
             var _token=$('input[name="_token"]').val();
             $.ajax({
                  url: '{{url('/admin/dashboard-filter')}}',
                   method: 'POST',
                   dataType:"JSON",
                   data: { _token:_token,dashboard_value:dashboard_value},
                   success:function(data){
                       chart.setData(data);
                   }
             });
             // alert(dashboard_value);
           });
           function chart30daysorder(){
              var _token=$('input[name="_token"]').val();
              $.ajax({
                  url: '{{url('/admin/days-order')}}',
                   method: 'POST',
                   dataType:"JSON",
                   data: { _token:_token},
                   success:function(data){
                       chart.setData(data);
                   }
             });
   
           }
           $('#btn-dashboard-filter').click(function(){
               // alert('an dau bui');
                var _token=$('input[name="_token"]').val();
                var from_date=$('#datepicker').val();
                var to_date=$('#datepicker2').val();
                // alert(from_date);
                // alert(to_deate);
                $.ajax({
                   url: '{{url('/admin/fiter-by-date')}}',
                   method: 'POST',
                   dataType:"JSON",
                   data: { _token:_token,from_date:from_date,to_date:to_date},
                   success:function(data){
                       chart.setData(data);
                   }
                });
           });
        });
    </script>
         <script type="text/javascript">
            $(document).ready(function(){
         var colorDanger = "#FF1744";
         Morris.Donut({
           element: 'donutt',
           resize: true,
           colors: [
             '#b434eb',
             '#00ACC1',
             '#93b32d',
             '#b3552d',
             '#006064'
           ],
           //labelColor:"#cccccc", // text color
           //backgroundColor: '#333333', // border color
           data: [
             {label:"Sản Phẩm", value:<?php echo $appproduct ?>},
             {label:"Tin Tức", value:<?php echo $appblog ?>},
             {label:"Nhân Viên", value:<?php echo $appcustomer ?>},
             {label:"Bài Viết", value:<?php echo $apporder ?>},
             {label:"Tài Khoản KH", value:<?php echo $appcontact ?>}
           ]
         });
            })
          </script>
     <script type="text/javascript">
        $('.order_details').change(function(){
           var order_status = $(this).val();
           var order_id = $(this).children(":selected").attr("id");
           var _token=$('input[name="_token"]').val();
           quantity= [];
           $("input[name='order_quantity']").each(function(){
               quantity.push($(this).val());
           });
           order_product_id=[];
           $("input[name='order_id']").each(function(){
               order_product_id.push($(this).val());
           });
           j=0;
           for(i=0;i<order_product_id.length;i++){
               // alert(order_product_id[i]);
               var order_qty=$('.order_quantity_'+order_product_id[i]).val();
               var order_qty_sto=$('.order_quantity_storage_'+order_product_id[i]).val();
               // alert(order_qty);
               // alert(order_qty_sto);
               if(parseInt(order_qty)>parseInt(order_qty_sto)){
                   j=j+1;
                   if(j==1){
                       alert('số lượng sản phẩm trong kho không đủ');
                   }
                   $('.color_quanity_'+order_product_id[i]).css('background','#807d6a');
               }
   
           }
           if(j==0){
           $.ajax({
                   url: '{{url('/admin/order/update-order-qty')}}',
                   method: 'POST',
                   data: { _token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id},
                   success:function(data){
                       alert('thay đổi trạng thái đơn hàng thành công');
                       location.reload();
                   }
               });
           }
           // alert(quantity);
           // alert(order_product_id);
           // alert(order_status);
           // alert(order_id);
           // alert(_token);
        });
    </script>
     <script type="text/javascript">
        $('.update_quantity').click(function(){
           var order_product_id = $(this).data('product_id');
           var order_quantity =$('.order_quantity_'+order_product_id).val();
           var order_code = $('.order_code').val();
           var _token=$('input[name="_token"]').val();
           // var order_quantitys=$('.order_quantity_storage_'+order_product_id).val();
           // alert(order_quantitys);
           // alert(order_quantity);
           // alert(order_code);
            $.ajax({
                   url: '{{url('/admin/order/update-quantity')}}',
                   method: 'POST',
                   data: {order_product_id:order_product_id, order_quantity:order_quantity,_token:_token,order_code:order_code},
                   success:function(data){
                       alert('Cập Nhập Số Lượng Thành Công');
                       location.reload();
                   }
               });
   
   
        });
    </script>
    <script>
        $('#calendar').datepicker();
      
        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);
      
        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
        // Chang Image add product
        function changeImg(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#anhSanPham').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#anhSanPham').click(function(){
                $('#img').click();
            });
        });
    </script>

</body>

</html>