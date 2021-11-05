@extends('backend-view')
@section('tit', 'Thêm Slide Trang WebSite')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Thêm Slide</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
        <div class="table-responsive">
            <form role="form" method="post" action="{{ asset('admin/slide/save-slide') }}"  enctype="multipart/form-data">
                <div class="form-group">
                    <hr>
                    {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                    <label class="label-domnoo-add col-md-3" >Tiêu Đề 1</label>
                    <input required type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Tiêu Đề 2</label>
                    <textarea class="ckeditor" name="title" style="width: 100%; height: 100%" required
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
                     <label class="label-domnoo-add col-md-3" >Ảnh Slide</label>
                    <input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
                    <img id="anhSanPham" class="thubnail" width="100%;" height="40%;" alt="yourImage"
                        src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                    <input type="hidden" name="status" value="1">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Thêm">
                </div>
                <div class="form-group">
                    <a href="{{ asset('admin/slide') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
