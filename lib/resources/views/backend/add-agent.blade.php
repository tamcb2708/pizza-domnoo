@extends('backend-view')
@section('tit', 'Thêm Thông Tin Nhân Viên')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Thêm Nhân Viên</h2>
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

            <form role="form" method="post" action="{{ asset('admin/agent/save-agent') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tên Nhân Viên</label>
                    <input required type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Địa Chỉ</label>
                    <input required type="text" name="address" class="form-control" value="{{ old('address') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tuổi</label>
                    <input required type="text" name="old" class="form-control col-md-2" value="{{ old('old') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Số Điện Thoại</label>
                    <input required type="text" name="phone" class="form-control" value="{{ old('phone') }}"
                        placeholder="Điền Thông Tin...">
                    <input type="hidden" name="facebook" value="">
                    <input type="hidden" name="instar" value="">
                    <input type="hidden" name="google" value="">
                    <input type="hidden" name="twitters" value="">
                    <input type="hidden" name="status" value="0">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Chứng Minh Nhân Dân</label>
                    <input required type="text" name="ag_cmnd" class="form-control" value="{{ old('phone') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Chức Vụ</label>
                    <input required type="text" name="ag_job" class="form-control" value="{{ old('phone') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Ghi Chú</label>
                    <textarea class="ckeditor" name="ag_note" style="width: 100%; height: 100%"
                    name="description" placeholder="Điền Thông Tin"></textarea>
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
                    <img id="anhSanPham" class="thubnail" width="10%;" height="10%;" alt="yourImage"
                        src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">

                </div>
                <div class="form-group">
                    <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Thêm">
                    <div class="form-group">
                        <a href="{{ asset('admin/agent') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang
                            Trước</a>
                    </div>
                    {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
