@extends('backend-view')
@section('tit', 'FeedBack Của Khách Hàng')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách FeedBack</h2>
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
            <a href="{{ asset('admin/feedback/add-feedback') }}" class="btn btn-primary">Thêm FeedBack </a>
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;"></th>
                        <th>
                            <p class="domnoo-name">Tên Khách Hàng</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Hình Ảnh</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Trạng Thái Hiển Thị</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Tóm Tắt</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Ngày Cập Nhập</p>
                        </th>
                        <th>
                            <p class="domnoo-acction-1">Chức Năng</p>
                        </th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td> </td>
                            <td class="domnoo-item-detail">{{ $item->fe_name }}</td>
                            <td class="domnoo-item-detail"><img width="150px"
                                    src="{{ asset('public/upload/image/' . $item->fe_img) }}" class="thumbnail">
                            </td>
                            <td class="domnoo-item-detail"><span class="text-ellipsis">
                                    <?php if($item->fe_status==0){ ?>
                                    <a href="{{ asset('admin/feedback/active/' . $item->fe_id) }} "
                                        onclick="return confirm('Bạn đã không để hiển thị feedback của khách ')"> <span
                                            style="font-family: wingdings; font-size: 200%;">&#252;</span></a>
                                    <?php }else{ ?>
                                    <a href="{{ asset('admin/feedback/actived/' . $item->fe_id) }}"
                                        onclick="return confirm('Bạn đã để hiển thị feedback  ')"><span
                                            class="fa fa-thumbs-down"></span></a>

                                    <?php } ?>
                                </span>
                            </td>
                            <td class="domnoo-item-detail">{!! $item->fe_desc !!}</td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/feedback/edit/' . $item->fe_id) }}"  class="btn btn-warning domnoo-action-2"> 
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Xem Thông Tin Hoặc Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/feedback/delete/' . $item->fe_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger domnoo-action-2"> 
                                    <i class="fas fa-fw fa-cog"></i>
                                    Xóa FeedBack
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
