@extends('backend-view')
@section('tit', 'Slide WebSite')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách Slide</h2>
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
            <a href="{{ asset('admin/slide/add-slide') }}" class="btn btn-primary">Thêm Slide </a>
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;">
                        </th>
                        <th>
                            <p class="domnoo-name">Tiêu Đề 1</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Hình Ảnh</p>
                        </th>
                        <th>
                            <p class="domnoo-name">Trạng Thái Hiển Thị</p>
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
                            <td class="domnoo-item-detail">{{ $item->sl_name }}</td>
                            <td class="domnoo-item-detail"><img width="150px"
                                    src="{{ asset('public/upload/image/' . $item->sl_img) }}" class="thumbnail">
                            </td>
                            <td class="domnoo-item-detail"><span class="text-ellipsis">
                                    <?php if($item->sl_status==0){ ?>
                                    <a href="{{ asset('admin/slide/active/' . $item->sl_id) }} "
                                        onclick="return confirm('Bạn đã không để hiển thị Slide của bạn ')">
                                        <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    </a>
                                    <?php }else{ ?>
                                    <a href="{{ asset('admin/slide/actived/' . $item->sl_id) }}"
                                        onclick="return confirm('Bạn đã để hiển thị Slide  ')">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </a>
                                    <?php } ?>
                                </span></td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/slide/edit/' . $item->sl_id) }}"
                                    class="btn btn-warning domnoo-action-2">
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Xem Thông Tin Hoặc Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/slide/delete/' . $item->sl_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')"
                                    class="btn btn-danger domnoo-action-2">
                                    <i class="fas fa-fw fa-cog"></i>Xóa Slide</a>
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
