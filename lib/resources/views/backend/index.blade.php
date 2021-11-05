@extends('backend-view')
@section('tit', 'trang chủ')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Trang Chủ</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Tổng Số Sản Phẩm Đã Bán</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $appstar; ?> Sản Phẩm</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary    text-uppercase mb-1">
                                    Tổng Số Đơn Hàng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $appsta; ?> Đơn</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tổng Doanh Thu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($app, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Tổng Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $appcustomer; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-cog fa-spin fa-3x fa-fw"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
        </div>

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Doanh Số</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <form autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="col-md-12">
                                        <p>Từ ngày: <input type="text" id="datepicker" class="form-control" name=""></p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Đến Ngày: <input type="text" id="datepicker2" class="form-control" name=""></p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Lọc Theo:
                                            <select class="dashboard-filter form-control">
                                                <option value="0">Chọn</option>
                                                <option value="7ngay">7 ngày qua</option>
                                                <option value="thangtruoc">tháng trước</option>
                                                <option value="thangnay">tháng này</option>
                                                <option value="365ngayqua">năm qua</option>
                                            </select>
                                        </p>
                                    </div>
                                    <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm"
                                        value="Lọc Kết Quả" name="">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area">
                            <div id="myfirstchart" style="height: 250px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sơ Lược</h6>
                        <div class="dropdown no-arrow">
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="donutt" id="donutt"></div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

                <!-- Project Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Lượt Người Online</h6>
                    </div>
                    <table style="background-color: rgb(227, 240, 239)" class="table table-bordered ">
                        <thead style="background-color: bisque">
                            <th scope="col">Onnline</th>
                            <th scope="col">Tháng Trước</th>
                            <th scope="col">Tháng Này</th>
                            <th scope="col">Năm Nay</th>
                            <th scope="col">Tổng</th>
                        </thead>
                        <tbody>
                            <td>{{ $visitors_count }}</td>
                            <td>{{ $visitor_last_month_count }}</td>
                            <td>{{ $visitor_of_thismonth_count }}</td>
                            <td>{{ $visitor_of_year_count }}</td>
                            <td>{{ $visitor_total }}</td>
                        </tbody>
                    </table>
                </div>

                <!-- Color System -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản Phẩm Nhiều Lượt Xem</h6>
                </div>
                <div class="row">
                    @foreach ($product_view as $item)
                    <div class="col-lg-6 mb-4">
                        <div style="background-color: blanchedalmond" class="card bg-primary text-white shadow">
                            <div style="height: 100px" class="card-body">
                                <img width="40px" height="40px"
                                    src="{{ asset('public/upload/image/' . $item->pr_img) }}"
                                    class="thumbnail domnoo-image">
                                <div class="com-md-3">
                                    {{ $item->pr_name }}
                                    <div class="text-white-50 small">{{ $item->pr_sold }} Lượt</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

            </div>

            <div class="col-lg-6 mb-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sản Phẩm Được Nhiều Lượt Mua</h6>
                    </div>
                    <div class="row">
                        @foreach ($pro as $item)
                            <div class="col-lg-6 mb-4">
                                <div style="background-color: blanchedalmond" class="card bg-primary text-white shadow">
                                    <div style="height: 100px" class="card-body">
                                        <img width="40px" height="40px"
                                            src="{{ asset('public/upload/image/' . $item->pr_img) }}"
                                            class="thumbnail domnoo-image">
                                        <div class="com-md-3">
                                            {{ $item->pr_name }}
                                            <div class="text-white-50 small">{{ $item->pr_sold }} Lượt</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Lưu Ý</h6>
                    </div>
                    <div class="card-body">
                        <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                            CSS bloat and poor page performance. Custom CSS classes are used to create
                            custom components and custom utility classes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection
