@extends('backend-view')
@section('tit', 'Danh Sách Mã Giảm Giá')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách Mã Giảm Giá</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
        </div>
        <div class="table-responsive">
            <a href="{{ asset('admin/coupon/add-coupon') }}" class="btn btn-primary">Thêm Mã Giảm Giá</a>
            <hr>
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th><p class="domnoo-name">Tên Mã Giảm</p></th>
                        <th><p class="domnoo-name">MÃ</p></th>
                        <th><p class="domnoo-name">Số Tiền Giảm Or Phần Trăm</p></th>
                        <th><p class="domnoo-name">Hình Thức</p></th>
                        <th><p class="domnoo-name">Số Lượng</p></th>
                        <th><p class="domnoo-name">Ngày bắt đầu</p></th>
                        <th><p class="domnoo-name">Ngày kết thúc</p></th>
                        <th><p class="domnoo-name">Tình trạng</p></th>
                        <th><p class="domnoo-name">Thời Gian Cập nhập lần cuối</p></th>
                        <th><p class="domnoo-acction-1">Tùy Chọn</p></th>
                        <th><p class="domnoo-acction-1">Quản lý gửi mã</p></th>
                    </tr>
                </thead>
                <tbody class="tbody-domnoo">
                    @foreach ($item as $da)
                        <tr>
                            <td class="domnoo-item-detail">{{ $da->con_name }} </td>
                            <td class="domnoo-item-detail">{{ $da->con_code }}
                            </td>
                            <td class="domnoo-item-detail">{{ $da->con_number }}</td>
                            <td class="domnoo-item-detail">
                                @if ($da->con_condition == 1)
                                    Giảm Giá Theo Phần Trăm
                                @elseif($da->con_condition==0)
                                    Giảm Giá Theo Giá Tiền
                                @else
                                    Chưa có Hình Thức Giảm Giá
                                @endif
                            </td>
                            <td class="domnoo-item-detail">{{ $da->con_time }}</td> 
                            <td class="domnoo-item-detail">{{ $da->con_date_start }}</td>
                            <td class="domnoo-item-detail">{{ $da->con_date_end }}</td>
                            <td class="domnoo-item-detail">
                                @if($da->con_date_end >= $today)
                                <span class="text-ellipsis">
                                    <?php if($da->con_status == 1){ ?>
                                    <a href="{{ asset('admin/coupon/active/' . $da->con_id) }} "
                                        onclick="return confirm('Bạn đã không để hoạt động mã giảm giá')">
                                        <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                        </a>

                                    <?php }else{ ?>
                                    <a href="{{ asset('admin/coupon/actived/' . $da->con_id) }}"
                                        onclick="return confirm('Bạn đã vô hiệu hóa mã giảm giá')">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </a>
                                    <?php } ?>
                                </span>
                                @else
                                      Mã giảm giá đã hết hạn
                                @endif
                            </td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($da->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/coupon/edit/' . $da->con_id) }}" class="btn btn-warning domnoo-action-2">
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/coupon/delete/' . $da->con_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')"  class="btn btn-danger domnoo-action-2">
                                    <i class="fas fa-fw fa-cog"></i>Xóa Mã</a>
                            </td>
                            <td>
                                <a href="{{ asset('admin/coupon/send-coupon-vip/' . $da->con_id) }}" class="btn btn-warning domnoo-action-2">
                                    <i class="fas fa-fw fa-cog"></i>
                                    Gửi Mã
                                </a>
                                <hr>
                                <a href="{{ asset('admin/coupon/send-coupon/' . $da->con_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-warning domnoo-action-2"
                                    ><i class="fas fa-fw fa-cog"></i>Gửi Mã</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" row pagination_style">
                <div class="page_number">
                    <ul>
                        {{ $ite->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
