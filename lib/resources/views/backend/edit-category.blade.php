@extends('backend-view')
@section('tit', 'Sửa Danh Mục Sản Phẩm')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Sửa Danh Mục Sản Phẩm</h2>
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
            <form method="post" action="{{ asset('admin/category/update-category/' . $cate->cate_id) }}">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Tên danh mục sản phẩm</label>
                    <input required type="text" name="name" class="form-control" placeholder="Điền Thông Tin..."
                        value="{{ $cate->cate_name }}">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Miêu tả danh mục sản phẩm</label>
                    <textarea class="ckeditor" name="meta_description" style="width: 100%; height: 100%" required
                         placeholder="Mô tả danh mục sản phẩm">{{ $cate->meta_description }}</textarea>
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
                    <label class="label-domnoo-add col-md-3" >Từ khóa tìm kiếm</label>
                    <input required type="text" name="meta_keywords" class="form-control"
                        placeholder="Từ khóa danh mục sản phẩm..." value="{{ $cate->meta_keyword }}">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Từ khóa url</label>
                    <input required type="text" name="cate_key_url" class="form-control"
                    placeholder="Từ khóa url danh mục sản phẩm..." value="{{ $cate->cate_key_url }}">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Icon danh muc</label>
                    <input required type="text" name="cate_icon" class="form-control"
                    placeholder="Icon danh mục sản phẩm..." value="{{ $cate->cate_icon }}">
                </div>
                <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Lưu">
                    <hr>
                <div class="form-group">
                    <a href="{{ asset('admin/category') }}"  class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
