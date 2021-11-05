@extends('backend-view')
@section('tit', 'Sửa Danh Mục Bài Viết')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Sửa Danh Mục Bài Viết</h2>
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
            <form method="post" action="{{ asset('admin/cate/update-cate/' . $cate->ca_id) }}">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Tên Danh Mục</label>
                    <input required type="text" name="names" class="form-control" placeholder="Điền Thông Tin..."
                        value="{{ $cate->ca_name }}">
                </div>
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3" >Mô tả danh mục bài viết
                        =======> </label>
                    <textarea class="ckeditor" name="description" style="width: 100%; height: 100%" required
                        placeholder="Mô tả danh mục bài viết">{{ $cate->ca_description }}</textarea>
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
                    <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Lưu">
                </div>

                <div class="form-group">
                    <a href="{{ asset('admin/cate') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
