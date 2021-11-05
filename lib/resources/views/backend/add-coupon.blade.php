@extends('backend-view')
@section('tit', 'Thêm Mã Giảm Giá')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Thêm Mã Giảm Giá</h2>
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
            <form method="post" action="{{ asset('admin/coupon/save-coupon') }}">
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3" >Tên Mã Giảm Giá</label>
                    <input required type="text" name="name" class="form-control col-md-4" placeholder="Tên Mã Giảm Giá">
                    <label class="label-domnoo-add col-md-3" >Mã Giảm Giá</label>
                    <input required type="text" name="code" class="form-control col-md-4" placeholder="Mã Giảm Giá">
                    <label class="label-domnoo-add col-md-3" >Ngày Bắt Đầu Giảm Giá</label>
                    <input type="text" name="date_start" id="coupon_datepicker" class="form-control col-md-4" placeholder="Tên Mã Giảm Giá">
                    <label class="label-domnoo-add col-md-3" >Ngày Kết Thúc Giảm Giá</label>
                    <input type="text" name="date_end" id="coupon_datepicker2"class="form-control col-md-4" placeholder="Tên Mã Giảm Giá">
                    <label class="label-domnoo-add col-md-3" >Chọn Số Lượng</label>
                    <input min="1" max="100" name="time" value="" type="number" class="cart_quantity form-control col-md-4">
                    <label class="label-domnoo-add col-md-3" >Chọn Phương Thúc</label>
                    <select class="form-control col-md-4" name="condition">
                        <option value="2">----Chọn----</option>
                        <option value="1">Giảm Theo Phần Trăm</option>
                        <option value="0">Giảm Theo Giá Tiên</option>
                    </select>
                    <label class="label-domnoo-add col-md-3" >Nhập</label>
                    <input required type="text" name="number" class="form-control col-md-4" placeholder="Nhập Số Tiền Hoặc Phần Trăm Được Giảm">
                </div>
                <div class="form-group">
                    <input required type="submit" name="addbrand" class="form-control btn btn-primary col-md-4" value="thêm mới">
                    <hr>
                    <a href="{{ asset('admin/coupon') }}"
                    class="form-control btn btn-warning col-md-4">Quay Về</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
