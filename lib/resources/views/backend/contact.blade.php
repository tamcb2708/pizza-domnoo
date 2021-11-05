@extends('backend-view')
@section('tit', 'Lời Nhắn Từ Khách Hàng')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách Lời Nhắn</h2>
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
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;"></th>
                        <th><p class="domnoo-name">Tên Khách Hàng</p></th>
                        <th><p class="domnoo-name">Email</p><th>
                        <th><p class="domnoo-name">Số Điện Thoại</p></th>
                        <th><p class="domnoo-name">Ngày Gửi</p></th>
                        <th><p class="domnoo-acction-1">Chức Năng</p></th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody class="tbody-domnoo">
                    @foreach ($items as $item)
                        <tr>
                            <td class="domnoo-item-detail">
                                <table class="i-check m-b-none">
                                    {{-- <input type="checkbox" name="post[]"> --}}
                                    <i></i>
                                </table>
                            </td>
                            <td class="domnoo-item-detail">{{ $item->ct_name }}</td>
                            <td class="domnoo-item-detail">{{ $item->ct_email }}</td>
                            <td class="domnoo-item-detail"></td>
                            <td class="domnoo-item-detail">{{ $item->ct_phone }}</td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/contact/edit/' . $item->ct_id) }}" class="btn btn-warning domnoo-action-2">
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Xem Thông Tin Chi Tiết
                                </a>
                                <a href="{{ asset('admin/contact/delete/' . $item->ct_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')"class="btn btn-danger domnoo-action-2">
                                    <i class="fas fa-fw fa-cog"></i>Xóa</a>
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
