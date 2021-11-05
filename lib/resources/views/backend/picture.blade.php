@extends('backend-view')
@section('tit', 'Thêm Ảnh Sản Ph')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Xem Hoặc Sửa Thông Tin Chi Tiết Sản Phẩm</h2>
            </div>
            <div class="row w3-res-tb">
                {{-- <div class="col-sm-5 m-b-xs">
                                <select name="" id="" class="input-sm form-control w-sm inline v-middle">
                                    <option value="0">Bulk action</option>
                                    <option value="1">Delete selectd</option>
                                    <option value="2">Bulk edit</option>
                                    <option value="3">Export</option>
                                </select>
                                {{-- <button class="btn btn-sm btn-default">Apply</button> --}}
            </div>
            <div class="col-sm-4">
            </div>
            {{-- <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" placeholder="search" name="" id="">
                                    <span>
                                        <button class="btn btn-sm btn-default" type="button">Go</button>
                                    </span>
                                </div>
                            </div> --}}
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
            @foreach ($all as $item)
                <form method="post" action="{{ asset('admin/product/save-picture/' . $item->pr_id) }}">
                    <div class="form-group">
                        @foreach ($image as $item)
                            <hr>
                            <label>Ảnh Sản Phẩm 1</label>
                            <input required id="img" type="file" name="img" class="form-control hidden"
                                onchange="changeImg(this)">
                            <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                                src="{{ asset('public/Backend/SanPham/' . $item->im_img1) }}">
                            <hr>
                            <label>Ảnh Sản Phẩm 2</label>
                            <input required id="img" type="file" name="img" class="form-control hidden"
                                onchange="changeImg(this)">
                            <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                                src="{{ asset('public/Backend/SanPham/' . $item->im_img2) }}">
                            <hr>
                            <label>Ảnh Sản Phẩm 3</label>
                            <input required id="img" type="file" name="img" class="form-control hidden"
                                onchange="changeImg(this)">
                            <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                                src="{{ asset('public/Backend/SanPham/' . $item->im_img3) }}">
                            <hr>
                            <label>Ảnh Sản Phẩm 4</label>
                            <input required id="img" type="file" name="img" class="form-control hidden"
                                onchange="changeImg(this)">
                            <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                                src="{{ asset('public/Backend/SanPham/' . $item->im_img4) }}">
                            <hr>
                            <label>Ảnh Sản Phẩm 5</label>
                            <input required id="img" type="file" name="img" class="form-control hidden"
                                onchange="changeImg(this)">
                            <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                                src="{{ asset('public/Backend/SanPham/' . $item->im_img5) }}">
                            <hr>
                        @endforeach
                    </div>
                    <div class="form-group">

                        <input required type="submit" name="submit" class="form-control btn btn-primary" value="Lưu">
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/product') }}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach



        </div>
    </div>


    </div>
    <!-- /.container-fluid -->

@endsection
