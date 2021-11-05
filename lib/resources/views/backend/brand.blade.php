@extends('backend-view')
@section('tit', 'Danh Sách Các Công Ty Liên Doanh')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Danh Sách Các Công Ty Liên Doanh</h2>
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
            <a href="{{ asset('admin/brand/add-brand') }}" class="btn btn-primary">Thêm Công Ty</a>
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;"></th>
                          <th>
                            <p class="domnoo-name">Tên Công Ty</p></th>
                          <th>
                            <p class="domnoo-name">Ảnh Hiệu</p></th>
                          <th>
                            <p class="domnoo-name">Trạng Thái Hiển Thị</p></th>
                          <th>
                            <p class="domnoo-name">Ngày Thêm</p></th>
                          <th>
                            <p class="domnoo-acction-1">Chức Năng</p></th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody class="tbody-domnoo">
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <table class="i-check m-b-none">
                                    {{-- <input type="checkbox" name="post[]"> --}}
                                    <i></i>
                                </table>
                            </td>
                            <td>{{ $item->bra_name }}</td>
                            <td><img width="150px" src="{{ asset('public/upload/image/' . $item->bra_image) }}"
                                    class="thumbnail"></td>
                            <td>
                                <span class="text-ellipsis">
                                    <?php if($item->bra_status==0){ ?>
                                    <a href="{{ asset('admin/brand/active/' . $item->bra_id) }} "
                                        onclick="return confirm('Bạn đã không để hiển thị thương hiệu của bạn ')">
                                        <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                        </a>
                                    <?php }else{  ?>
                                    <a href="{{ asset('admin/brand/actived/' . $item->bra_id) }}"
                                        onclick="return confirm('Bạn đã để hiển thị bài viết  ')">
                                        <i class="fas fa-fw fa-cog"></i>
                                    </a>
                                    <?php } ?>
                                </span>
                            </td>
                            <td>{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/brand/edit/' . $item->bra_id) }}" class="btn btn-warning domnoo-action-2">
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Xem Thông Tin Hoặc Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/brand/delete/' . $item->bra_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger domnoo-action-2"> 
                                     <i class="fas fa-fw fa-cog"></i></span>Xóa</a>
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
