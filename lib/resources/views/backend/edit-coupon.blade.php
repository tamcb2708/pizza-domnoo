@extends('backend-view')
@section('tit', 'Sửa Mã Giảm Giá')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Sửa hoặc thêm thông tin mã giảm giá</h2>
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
            @foreach ($all as $da)
                <form method="post" action="{{ asset('admin/coupon/update-coupon/' . $da->con_id) }}">
                    <div class="form-group">
                        <label class="label-domnoo-add col-md-3">Tên Mã Giảm Giá</label>
                        <input required type="text" value="{{ $da->con_name }}" name="name"  class="form-control col-md-4"
                            placeholder="Tên mã giảm giá">
                        <label class="label-domnoo-add col-md-3"> Mã Giảm Giá</label>
                        <input required type="text" name="code" value="{{ $da->con_code }}" class="form-control col-md-4"
                            placeholder="Mã giảm giá">
                        <label class="label-domnoo-add col-md-3">Số Lượng</label>
                        <input min="1" max="100" name="number" value="{{ $da->con_number }}" type="number"
                            class="cart_quantity form-control col-md-4">
                        <label class="label-domnoo-add col-md-3">Phương Thức Giảm</label>
                        <?php
                        $value = " ";
                        if($da->con_condition = 1){
                            $value = "Đã Chọn Giảm Theo Phần Trăm";
                        }else{
                            $value = "Đã Chọn Giảm Theo Giá Tiền";
                        }
                        ?>
                        <select class="form-control col-md-4" name="condition">
                            <option value="{{ $da->con_condition }}">{{ $value }}</option>
                            <option value="1">Giảm Theo Phần Trăm</option>
                            <option value="2">Giảm Theo Giá Tiền</option>
                        </select>
                        <label style="width: 100%; padding: 15px 8px">Giá trị</label>
                        <input required type="text" name="time" value="{{ $da->con_time }}"class="form-control col-md-4"
                            placeholder="Nhấp số tiền giảm theo phần trăm hoặc giá tièn">
                    </div>
                    <div class="form-group">
                        <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4"
                            value="Lưu">
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/coupon') }}" class="form-control btn btn-warning col-md-4">Hủy Bỏ</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
