@extends('backend-view')
@section('tit', 'Xem FeedBack Của Khách Hàng')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Thêm FeedBack</h2>
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
            <form role="form" method="post" action="{{ asset('admin/feedback/save-feedback') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Tên Khách Hàng</label>
                    <input required type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Điền Thông Tin...">
                    <input type="hidden" name="status" value="1">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Ảnh Khách Hàng</label>
                    <input required id="img" type="file" name="img" class="form-control hidden form-control col-md-2" onchange="changeImg(this)">
                    <img id="anhSanPham" class="thubnail" width="30%;" height="30%;" alt="yourImage"
                        src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Tóm Tắt</label>
                    <textarea class="ckeditor" name="desc" style="width: 100%; height: 100%" required
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
                </div>
                <div class="form-group">
                    <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Thêm">
                </div>
                <div class="form-group">
                    <a href="{{ asset('admin/feedback') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
