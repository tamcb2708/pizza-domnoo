@extends('backend-view')
@section('tit', 'Bài Viết Về Lịch sử Nhà Hàng')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách Bài viết</h2>
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
            <a href="{{ asset('admin/history/add-history') }}" class="btn btn-primary">Thêm Bài Viết </a>
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;"></th>
                          <th><p class="domnoo-name">Ảnh Bài Viết</p></th>
                          <th><p class="domnoo-name">Thời Gian</p></th>
                          <th><p class="domnoo-name">Trạng Thái Hiển Thị</p></th>
                          <th><p class="domnoo-name">Tiêu Đề</p></th>
                          <th><p class="domnoo-name">Ngày Cập Nhập</p></th>
                          <th><p class="domnoo-acction-1">Chức Năng</p></th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody class="tbody-domnoo">
                    @foreach ($items as $item)
                        <tr>
                            <td class="domnoo-item-detail"></td>
                            <td class="domnoo-item-detail">
                                <img width="150px" src="{{ asset('public/upload/image/' . $item->hi_img) }}"
                                    class="thumbnail">
                            </td>
                            <td class="domnoo-item-detail">{{ $item->hi_time }}</td>
                            <td class="domnoo-item-detail">
                                <span class="text-ellipsis">
                                    <?php if($item->hi_status==0){ ?>
                                    <a href="{{ asset('admin/history/active/' . $item->hi_id) }} "
                                        onclick="return confirm('Bạn đã không để bài viết  của bạn hiển thị')">
                                        <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    </a>

                                    <?php }else{ ?>
                                    <a href="{{ asset('admin/history/actived/' . $item->hi_id) }}"
                                        onclick="return confirm('Bạn đã để hiển thị bài viết  ')">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </a>
                                    <?php } ?>
                                </span>
                            </td>
                            <td class="domnoo-item-detail">
                                <p>{!! $item->hi_title !!}</p>
                            </td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/history/edit/' . $item->hi_id) }}" class="btn btn-warning domnoo-action-2">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Xem Thông Tin Hoặc Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/history/delete/' . $item->hi_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger domnoo-action-2"> 
                                    <i class="fas fa-fw fa-cog"></i>Xóa Bài Viết
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
