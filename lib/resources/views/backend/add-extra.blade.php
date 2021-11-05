@extends('backend-view')
@section('tit', '')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Thêm Tùy Chọn Của Bánh Pizza</h2>
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
            <form method="post" action="{{ asset('admin/extra/save-extra') }}">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tên Viền Chọn</label>
                    <input required type="text" name="name" class="form-control col-md-4"value="{{ old('name') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Giá Thêm Viền</label>
                    <input required type="text" name="price" class="form-control col-md-4" value="{{ old('price') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                </div>
                <div class="form-group">
                    <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Thêm">
                </div>
                <div class="form-group">
                    <a href="{{ asset('admin/extra') }}"  class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
