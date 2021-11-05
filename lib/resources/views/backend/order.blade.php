@extends('backend-view')
@section('tit', 'Danh Sách Đơn Hàng')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Danh Sách Đơn Hàng</h2>
            </div>
            <?php  $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            } ?>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Thứ Tự</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Tình Trạng Đơn Hàng</th>
                        <th>Thời Gian Cập Nhập</th>
                        <th>Tùy Chọn</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($items as $or)
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
                                    Xem Chi Tiết
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row pagination_style">
                <div class="page_number">
                    <ul>
                        {{ $ite->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
