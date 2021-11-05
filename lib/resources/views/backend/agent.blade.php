@extends('backend-view')
@section('tit', 'Nhân Viên')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Danh Sách Nhân Viên</h2>
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
            <a href="{{ asset('admin/agent/add-agent') }}" class="btn btn-primary">Thêm Nhân Viên </a>
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;">
                        </th>
                        <th>
                            <p class="domnoo-name">Tên Nhân Viên</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Địa Chỉ</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Hình Ảnh</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Trạng Thái Hiển Thị</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Tuổi</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Số Điện Thoại</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Ngày Thêm</p>
                        </th>
                        <th>
                            <p class="domnoo-acction-1">Chức Năng</p>
                        </th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody class="tbody-domnoo">
                    @foreach ($items as $item)
                        <tr>
                            <td class="domnoo-item-detail">
                            </td>
                            <td class="domnoo-item-detail">{{ $item->ag_name }}</td>
                            <td class="domnoo-item-detail">{{ $item->ag_address }}</td>
                            <td class="domnoo-item-detail">
                                <img width="150px" src="{{ asset('public/upload/image/' . $item->ag_img) }}"
                                    class="thumbnail">
                            </td>
                            <td class="domnoo-item-detail">
                                <span class="text-ellipsis">
                                    <?php if($item->ag_status==0){ ?>
                                    <a href="{{ asset('admin/agent/active/' . $item->ag_id) }} "
                                        onclick="return confirm('Bạn đã không để hiển thị nhân viên của bạn ')">
                                        <span style="font-family: wingdings; font-size: 200%;">&#252;</span></a>

                                    <?php }else{ ?>
                                    <a href="{{ asset('admin/agent/actived/' . $item->ag_id) }}"
                                        onclick="return confirm('Bạn đã để hiển thị nhân viên  ')">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </a>
                                    <?php } ?>
                                </span>
                            </td>
                            <td class="domnoo-item-detail">{{ $item->ag_old }}</td>
                            <td class="domnoo-item-detail">{{ $item->ag_phone }}</td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/agent/edit/' . $item->ag_id) }}" class="btn btn-warning domnoo-action-2"> 
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Xem Thông Tin Hoặc Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/agent/delete/' . $item->ag_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')"  class="btn btn-danger domnoo-action-2"> 
                                    <i class="fas fa-fw fa-cog"></i>
                                    Xóa Nhân Viên
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
