@extends('backend-view')
@section('tit', ' ')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Sửa thông tin viền Bánh</h2>
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
            @foreach ($all as $item)
                <form method="post" action="{{ asset('admin/rim/update-rim/' . $item->ri_id) }}">
                    <div class="form-group">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Tên Tùy Chọn</label>
                        <input required type="text" name="name" class="form-control col-md-4"  readonly
                            placeholder="Điền Thông Tin..." value="{{ $item->ri_name }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Giá</label>
                        <input required type="text" name="price" class="form-control col-md-4"  placeholder="Điền Thông Tin..."
                            value="{{ $item->ri_price }}">
                        <hr>
                    </div>
                    <div class="form-group">
                        <input required type="submit" name="submit"  class="form-control btn btn-primary col-md-4" value="Lưu">
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/rim') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
