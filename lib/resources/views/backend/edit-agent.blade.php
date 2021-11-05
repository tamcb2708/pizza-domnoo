@extends('backend-view')
@section('tit', 'Sửa Thông Tin Nhân Viên')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Xem Hoặc Sửa Thông Tin Nhân Viên</h2>
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
                <form method="post" role="form" action="{{ asset('admin/agent/update-agent/' . $item->ag_id) }}"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Tên Nhân Viên</label>
                        <input required type="text" name="name" class="form-control col-md-3" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_name }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Tuổi</label>
                        <input required type="text" name="old" class="form-control col-md-2" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_old }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Số Điện Thoại</label>
                        <input required type="text" name="phone" class="form-control col-md-3"
                            placeholder="Điền Thông Tin..." value="{{ $item->ag_phone }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Địa Chỉ</label>
                        <input required type="text" name="address" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_address }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Link FaceBook Nhân Viên</label>
                        <input required type="text" name="facebook" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_facebook }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Link Twitters Nhân Viên</label>
                        <input required type="text" name="twitters" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_twitters }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Link Trang Cá Nhân</label>
                        <input required type="text" name="google" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_google }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Link Instagam</label>
                        <input required type="text" name="instar" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_instar }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Nhứng minh nhân dân</label>
                        <input required type="text" name="ag_cmnd" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_cmnd }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Chức vụ</label>
                        <input required type="text" name="ag_job" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->ag_job }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ghi chú</label>
                        <textarea disabled class="ckeditor" name="ag_note" style="width: 100%; height: 100%"
                        name="description" placeholder="Điền Thông Tin">{{ $item->ag_note }}</textarea>
                    <script type="text/javascript">
                        var editor = CKEDITOR.replace('description', {
                            language: 'vi',
                            filebrowserImageBrowseUrl: '../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                            filebrowserFlashBrowseUrl: '../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                            filebrowserImageUploadUrl: '../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                            filebrowserFlashUploadUrl: '../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                        });
                    </script>
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ảnh Nhân Viên</label>
                        <input required id="img" type="file" name="img" class="form-control hidden col-md-2"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                            src="{{ asset('public/upload/image/' . $item->ag_img) }}">
                        <hr>
                    </div>
                    <div class="form-group">
                        <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4"
                            value="Lưu">
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/agent') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang
                            Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
