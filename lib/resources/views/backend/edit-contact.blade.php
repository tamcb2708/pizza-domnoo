@extends('backend-view')
@section('tit', 'Thông Tin Chi Tiết')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Xem Thông Tin Chi Tiết</h2>
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
            @foreach ($all as $item)
                <form method="post">
                    <div class="form-group">
                        <hr>
                        {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                        <label class="label-domnoo-add col-md-3" >Tên Khách Hàng</label>
                        <input required type="text" readonly name="name" class="form-control col-md-4"
                            placeholder="Điền Thông Tin..." value="{{ $item->ct_name }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Email Khách Hàng</label>
                        <input required type="text" readonly name="name" class="form-control col-md-4"
                            placeholder="Điền Thông Tin..." value="{{ $item->ct_email }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Số Điện Thoại Khách Hàng</label>
                        <input required type="text" readonly name="name" class="form-control col-md-4"
                            placeholder="Điền Thông Tin..." value="{{ $item->ct_phone }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Ngày Gửi</label>
                        <input required type="text" readonly name="name" class="form-control col-md-4"
                            placeholder="Điền Thông Tin..." value="{{ $item->created_at }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Lời Nhắn</label>
                        <textarea disabled class="ckeditor" readonly name="title" style="width: 100%; height: 100%" required
                            placeholder="Điền Thông Tin">{!! $item->ct_desc !!}</textarea>
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/contact') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
