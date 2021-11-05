@extends('backend-view')
@section('tit', '')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách Tùy Chọn Thêm Của Pizza</h2>
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
            <a href="{{ asset('admin/extra/add-extra') }}" class="btn btn-primary">Thêm Tùy Chọn</a>
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;">
                        </th>
                        <th><p class="domnoo-name">Tên Tùy Chọn</p></th>
                        <th><p class="domnoo-name">Giá Thêm Tùy chọn</p></th>
                        <th><p class="domnoo-name">Ngày Thêm</p></th>
                        <th><p class="domnoo-acction-1">Chức Năng</p></th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr class="domnoo-item-1">
                            <td></td>
                            <td class="domnoo-item-detail">{{ $item->ex_name }}</td>
                            <td class="domnoo-item-detail">{{ number_format($item->ex_price, 0, ',', '.') }}</td>
                            </span></td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/extra/edit/' . $item->ex_id) }}" class="btn btn-warning domnoo-action-2">
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Xem Thông Tin Hoặc Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/extra/delete/' . $item->ex_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')"  class="btn btn-danger domnoo-action-2"> 
                                    <i class="fas fa-fw fa-cog"></i>Xóa Sản Phẩm
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
