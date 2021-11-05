@extends('backend-view')
@section('tit', 'Tài Khoản Admin')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Trang Thông tin</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
        </div>
        <div class="container">
            <form  role="form"  method="POST" action="{{asset('admin/save-setting/'.$item['ad_id'])}}" enctype="multipart/form-data">
                @csrf
                @foreach ($errors->all() as $val)
                <ul>
                    <li>{{$val}}</li>
                </ul>
                    
                @endforeach
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3">Họ và tên</label>
                    <input type="text" class="form-control form-control-user" name="ad_name" value="{{ $item['ad_name'] }}" id="exampleInputEmail"
                        placeholder="Email">
                </div>
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3">Email người dùng</label>
                    <input readonly type="email" class="form-control form-control-user" name="ad_email" value="{{ $item['ad_email'] }}" id="exampleInputEmail">
                </div>
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3">Độ tuổi</label>
                    <input type="number" min="5" max="100" class="form-control form-control-user col-md-1" name="ad_old" value="{{ $item['ad_old'] }}" id="exampleInputEmail"
                        placeholder="5">
                </div>
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3">Số điện thoại</label>
                    <input type="text" class="form-control form-control-user" name="ad_phone" value="{{ $item['ad_phone'] }}" id="exampleInputEmail"
                        placeholder="Phone">
                </div>
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3">Ảnh đại diện</label>
                    <input required id="img" type="file" name="img" class="form-control col-md-2 hidden"
                                onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                        src="{{ asset('public/upload/image/' . $item['ad_img']) }}">
                </div>
                <div class="form-group row">
                    <label class="label-domnoo-add col-md-3">Địa chỉ</label>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user"
                            id="exampleInputPassword" name="ad_address" value="{{ $item['ad_address'] }}" placeholder="ở khu này xã này nhà này">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="label-domnoo-add col-md-3">Mật khẩu</label>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required type="password" class="form-control form-control-user"
                            id="exampleInputPassword" name="ad_check_password" value="{{ $item['ad_password'] }}" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="label-domnoo-add col-md-3">Nhập lại mật khẩu</label>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input required type="password" class="form-control form-control-user"
                            id="exampleInputPassword" name="ad_password" placeholder="Password">
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Lưu">
                <hr>
            </form>
        </div>
    </div
@endsection
