@extends('backend-view')
@section('tit', 'Thêm Công Ty Hợp Tác')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Thêm Công Ty</h2>
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
            <form role="form" method="post" action="{{ asset('admin/brand/save-brand') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tên Công Ty</label>
                    <input required type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Link Công Ty</label>
                    <input required type="text" name="bra_link" class="form-control" value="{{ old('bra_link') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Ngày Bắt Đầu</label>
                    <input required type="text" name="bra_start" class="form-control" value="{{ old('bra_start') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Ngày Kết Thúc</label>
                    <input required type="text" name="bra_end" class="form-control" value="{{ old('bra_end') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Ảnh Đại Diện Công Ty</label>
                    <input required id="img" type="file" name="image" class="form-control hidde col-md-2"
                        onchange="changeImg(this)">
                    <img id="anhSanPham" class="thubnail" width="10%;" height="10%;" alt="yourImage"
                        src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                    <hr>
                    <input type="hidden" name="status" value="1">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tóm Tắt Hợp Tác</label>
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
                    <a href="{{ asset('admin/brand') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang
                        Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
