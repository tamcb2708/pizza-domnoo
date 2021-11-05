@extends('backend-view')
@section('tit', 'Chi Tiết Đơn Hàng')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Chi Tiết Đơn Hàng</h2>
            </div>
            <hr>
            <div class="row w3-res-tb">
                <h3>
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?></h3>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                {{-- <div class="input-group">
                                    <input type="text" class="input-sm form-control" placeholder="search" name="" id="">
                                    <span>
                                        <button class="btn btn-sm btn-default" type="button">Go</button>
                                    </span>
                                </div> --}}
            </div>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
            <h4>Các Đơn Hàng Khác</h4>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>thứ tự</th>
                        <th>mã đơn hàng</th>
                        <th>tình trạng đơn hàng</th>
                        <th>thời gian</th>
                        <th style="width: 30%;">tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($ord as $key => $or)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{ $i }} </td>
                            <td>TTKTG{{ $or->order_id }}{{ $or->order_code }}</td>
                            <td>
                                @if ($or->order_status == 1)
                                    <p style="background-color: #e6dc83">Đơn Hàng Mới</p>
                                @else
                                    <p style="background-color: #807d6a">Đơn Hàng Đã Xử Lý</p>
                                @endif
                            </td>
                            <td>{{ date('d/m/Y H:i', strtotime($or->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/order/view-order/' . $or->order_code) }}" class="btn btn-warning domnoo-action-2">
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    View Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $ord->links() }}
            <hr>
            <div>
                <h4>Thông Tin Tài Khoản Khách</h4>
                <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                    <thead>
                        <tr class="">
                                        <th>Họ Và Tên</th>
                                        <th>Email</th>
                                        <th>Địa Chỉ</th>
                                        <th>Số Điện Thoại</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td style="
                            color: red">{{ $customer->cus_name }}</td>
                            <td>{{ $customer->cus_email }}</td>
                            <td>{{ $customer->cus_address }}</td>
                            <td>{{ $customer->cus_phone }}</td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <hr>
            <div>
                <h4>Thông tin Vận Chuyển</h4>
                <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                    <thead>
                        <tr class="">
                                        <th>Tên Người Nhận</th>
                                        <th>Địa Chỉ Người Nhận</th>
                                        <th>Số Điện Thoại</th>
                                        <th>ghi chú</th>
                                        <th>Phương Thức</th>
                                        <th>Ngày Ship</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <tr>
                                            <td style="
                            color: red">{{ $shipping->ship_name }}</td>
                            <td style="color: blue">{{ $shipping->ship_address }}</td>
                            <td>{{ $shipping->ship_phone }}</td>
                            <td>{{ $shipping->ship_note }}</td>
                            <td>
                                @if ($shipping->ship_paymment == 1)
                                    Nhận Hàng Rồi Thanh Toán
                                @else
                                    Thanh Toán Chuyển Khoản
                                @endif
                            </td>
                            <td>{{ $shipping->created_at }}</td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <hr>
            <div>
                <h4>Danh Sách Sản Phẩm Khách Đặt</h4>
                <table class="table table-bordered" style="padding: 300px width: 50%; height: 100%;">
                    <thead class="thead-domnoo">
                        <tr class="">
                                        <th>Số Thứ Tự</th>
                                        <th>Mã Sản Phẩm</th>
                                        {{-- <th>Mã giảm giá</th> --}}
                                        <th>Ảnh Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Cỡ Bánh</th>
                                        <th>Đế Bánh</th>
                                        <th>Tùy Chọn Thêm</th>
                                        <th>Tùy Chọn Viền</th>
                                        <th>Giá Tiền</th>
                                        <th>Số Lượng Đặt</th>
                                        <th>Tổng tiền sản phẩm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                         @php
                                            $i = 0;
                                            $total = 0;
                                            
                                        @endphp
                                    @foreach ($order_details_product as $key => $order)
                                        @php
                                            $i++ ;
                                            $tongtien=$order->product_price * $order->product_quantity;
                                            $total +=$tongtien ;

                                        @endphp
                                        <tr class="
                            color_quanity_{{ $order->product_id }}">
                            <td>{{ $i }}</td>
                            <td style="color: red">{{ $order->product_id }}</td>
                            {{-- <td>
                                            @if ($order->product_coupon != 'khong co coupon')
                                                {{$order->product_coupon}}
                                            @else
                                                Không có mã giảm giá
                                            @endif --}}
                            <input type="hidden" name="order_id" class="order_id" value="{{ $order->product_id }}">
                            <input type="hidden" name="order_quantitys"
                                class="order_quantity_storage_{{ $order->product_id }}"
                                value="{{ $order->product_quantity }}">
                            <input type="hidden" name="order_code" class="order_code" value="{{ $order->order_code }}">
                            </td>
                            <td><img width="100px;" height="100px;"
                                    src="{{ asset('public/upload/image/' . $order->product->pr_img) }}" alt=""></td>
                            <td style="color: rgb(94, 19, 233)">{{ $order->product_name }}</td>
                            <td class="product_color">
                                @if ($order->product_size == 1)
                                    Cỡ 12 inch
                                @elseif($order->product_size==2)
                                    Cỡ 9 inch
                                @elseif($order->product_size==3)
                                    Cỡ 7 inch
                                @else 
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                @endif
                            </td>
                            <td class="product_size">
                                @if ($order->product_base == 1)
                                    Đế Mỏng
                                @elseif($order->product_base==2)
                                    Đế Vừa
                                @elseif($order->product_base==3)
                                    Đé Dày
                                @else
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                @endif

                            </td>
                            <td>
                                @if ($order->product_extra == 1)
                                    Thêm Phô Mai
                                @elseif($order->product_extra==2)
                                    Gấp Đôi Phô Mai
                                @elseif($order->product_extra==3)
                                    Gấp Ba Phô Mai
                                @elseif($order->product_extra==0)
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                @else 
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                @endif
                            </td>
                            <td>
                                @if ($order->product_rim)
                                    Phô Mai
                                @elseif($order->product_rim)
                                    Sô Cô La
                                @else
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                @endif
                            </td>
                            <td>{{ number_format($order->product_price, 0, ',', '.') }}VND</td>
                            <td><input type="number" {{ $order_status == 2 ? 'disabled' : '' }}
                                    value="{{ $order->product_quantity }}" class="order_quantity_{{ $order->product_id }}"
                                    name="order_quantity">
                                <hr>
                                @if ($order_status != 2)
                                    <button name="update_quantity" data-product_id="{{ $order->product_id }}"
                                        class="btn btn-warning update_quantity">Cập Nhập</button>
                                @endif
                            </td>

                            <td> {{ number_format($tongtien, 0, ',', '.') }}VND</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">

                                @php
                                    $total_coupon = 0;
                                @endphp
                                @if ($coupon_condition == 1)
                                    @php
                                        $total_after_coupon = ($total * $coupon_number) / 100;
                                        echo 'Tổng giảm:' . number_format($total_after_coupon, 0, ',', '.') . 'VND' . '</br>';
                                        $total_coupon = $total - $total_after_coupon + $order->product_freeship;
                                    @endphp
                                @else
                                    @php
                                        echo 'Tổng giảm:' . number_format($coupon_number, 0, ',', '.') . 'VND' . '</br>';
                                        $total_coupon = $total - $coupon_number + $order->product_freeship;
                                    @endphp
                                @endif
                                Phí Ship: {{ number_format($order->product_freeship, 0, ',', '.') }}VND</br>
                                Tổng: {{ number_format($total, 0, ',', '.') }}VND </br>
                                Khách Thanh Toán <h4>{{ number_format($total_coupon, 0, ',', '.') }}VND</h4>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                @foreach ($orders as $or)

                                    @if ($or->order_status == 1)
                                        <form>
                                            {{ csrf_field() }}
                                            <select class="form-control order_details " style="background-color: #e0d999">
                                                <option class="domnoo-item-detail" id="{{ $or->order_id }}" selected value="1">Chưa Xử Lý</option>
                                                <option class="domnoo-item-detail" id="{{ $or->order_id }}" value="2">Xử Lý Đơn Hàng</option>
                                            </select>
                                        </form>
                                    @else
                                        <form>
                                            {{ csrf_field() }}
                                            <select class="form-control order_details">
                                                <option class="domnoo-item-detail" id="{{ $or->order_id }}" value="1">Khôi Phục</option>
                                                <option class="domnoo-item-detail" id="{{ $or->order_id }}" selected value="2">Đã Xử Lý</option>
                                            </select>
                                            <hr>
                                            <a target="_blank" class="btn btn-danger"
                                                href="{{ asset('admin/order/print-order/' . $order->order_code) }}">In Đơn
                                                Hàng</a>
                                        </form>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>


    </div>
    <!-- /.container-fluid -->

@endsection
