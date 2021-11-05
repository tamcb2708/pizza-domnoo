@extends('backend-view')
@section('tit', 'Thêm Bài Viết')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Thêm Bài Viết</h2>
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
            <form role="form" method="post" action="{{ asset('admin/blog/save-blog') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tên Bài Viết</label>
                    <input required type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Khóa Tìm Kiếm</label>
                    <input required type="text" name="bl_keyword" class="form-control" value="{{ old('bl_keyword') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Khóa Url</label>
                    <input required type="text" name="bl_key_url" class="form-control col-md-4" value="{{ old('bl_key_url') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tác Giả</label>
                    <input required type="text" name="author" class="form-control col-md-4" value="{{ old('author') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <input type="hidden" name="img2" value="">
                    <input type="hidden" name="img3" value="">
                    <input type="hidden" name="desc1" value="">
                    <input type="hidden" name="desc2" value="">
                    <input type="hidden" name="desc3" value="">
                    <input type="hidden" name="desc4" value="">
                    <input type="hidden" name="desc5" value="">
                    <input type="hidden" name="comment" value="0">
                    <input type="hidden" name="status" value="1">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Ảnh Bài Viết Chính</label>
                    <input required id="img" type="file" name="img1" class="form-control hidden col-md-2"
                        onchange="changeImg(this)">
                    <img id="anhSanPham" class="thubnail" width="10%;" height="10%;" alt="yourImage"
                        src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Tóm Tắt</label>
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
                    <label class="label-domnoo-add col-md-3">Danh Mục</label>
                    <select required name="cate" class="form-control">
                        @foreach ($catelist as $cate)
                            <option value="{{ $cate->ca_id }}">{{ $cate->ca_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Thêm">
                </div>
                <div class="form-group">
                    <a href="{{ asset('admin/blog') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang
                        Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
