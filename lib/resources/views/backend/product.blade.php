@extends('backend-view')
@section('tit', 'Danh Sách Sản Phẩm')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách Sản Phẩm</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
        </div>
        <a href="{{ asset('admin/product/add-product') }}" class="btn btn-primary">Thêm Sản Phẩm </a>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead class="thead-domnoo">
                    <tr>
                        <th style="width:20px;"></th>
                        <th><p class="domnoo-name">Tên Sản Phẩm</p></th>
                        <th><p class="domnoo-name">Hình Ảnh</p></th>
                        <th><p class="domnoo-name">Khóa Tìm Kiếm</p></th>
                        <th><p class="domnoo-name">Khóa url</p></th>
                        <th><p class="domnoo-name">Trạng Thái Hiển Thị</p></th>
                        <th><p class="domnoo-name">Pizza</p></th>
                        <th><p class="domnoo-name">Giá Sản Phẩm</p></th>
                        <th><p class="domnoo-name">Thay Đổi Lần Cuối</p></th>
                        <th><p class="domnoo-name">Danh Mục Sản Phẩm</p></th>
                        <th><p class="domnoo-acction-1">Chức Năng</p></th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody class="tbody-domnoo">
                    @foreach ($item as $item)
                        <tr class="domnoo-item-1">
                            <td class="domnoo-item-detail">
                            </td>
                            <td class="domnoo-item-detail">{{ $item->pr_name }}</td>
                            <td class="domnoo-item-detail-img">
                                <img width="150px" src="{{ asset('public/upload/image/' . $item->pr_img) }}"
                                    class="thumbnail img-domnoo">
                            </td>
                            <td class="domnoo-item-detail">{{ $item->pr_keyword }}</td>
                            <td class="domnoo-item-detail">{{ $item->pr_url_key }}</td>
                            <td class="domnoo-item-detail">
                                <span class="text-ellipsis">
                                    <?php if($item->pr_status==0){ ?>
                                    <a href="{{ asset('admin/product/active/' . $item->pr_id) }} "
                                        onclick="return confirm('Bạn đã không để hiển thị sản phẩm')">
                                        <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    </a>
                                    <?php }else{ ?>
                                    <a href="{{ asset('admin/product/actived/' . $item->pr_id) }}"
                                        onclick="return confirm('Bạn đã để hiển thị sản phẩm ')">
                                        <i class="fas fa-fw fa-cog"></i>
                                </a>
                                    <?php } ?>
                                </span>
                            </td>
                            <td class="domnoo-item-detail">
                                <?php if($item->pr_pizza==1){ ?>
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                <?php } ?>
                            </td>
                        
                            <td class="domnoo-item-detail">
                               {{ number_format($item->pr_price, 0, ',', '.') }} <span> VND</span>
                            </td>
                            <td class="domnoo-item-detail">{{ date('d/m/Y H:i', strtotime($item->updated_at)) }}</td>
                            <td class="domnoo-item-detail">{{ $item->cate_name }}</td>
                            <td >
                                <a href="{{ asset('admin/product/edit/' . $item->pr_id) }}" class="btn btn-warning domnoo-action-2">
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Xem Thông Tin Hoặc Sửa
                                </a>
                                <hr>
                                <a href="{{ asset('admin/product/delete/' . $item->pr_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger domnoo-action-2"> 
                                    <i class="fas fa-fw fa-cog"></i>Xóa Sản Phẩm</a>
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
