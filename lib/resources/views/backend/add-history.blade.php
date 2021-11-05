@extends('backend-view')
@section('tit', 'Bài Viết ')
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
            <form  role="form" method="post" action="{{ asset('admin/history/save-history') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Thời Gian</label>
                    <input required type="text" name="time" class="form-control" value="{{ old('time') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Khóa Tìm Kiếm</label>
                    <input required type="text" name="hi_keyword" class="form-control" value="{{ old('hi_keyword') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Khóa Url</label>
                    <input required type="text" name="hi_key_url" class="form-control col-md-4" value="{{ old('hi_key_word') }}"
                        placeholder="Điền Thông Tin...">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Tiêu Đề</label>
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
                    <input type="hidden" name="desc1" value="">
                    <input type="hidden" name="desc2" value="">
                    <input type="hidden" name="desc3" value="">
                    <input type="hidden" name="desc4" value="">
                    <input type="hidden" name="status" value="0">
                    <hr>
                    <label class="label-domnoo-add col-md-3" >Ảnh( Bắt Có)</label>
                    <input required id="img" type="file" name="img" class="form-control hidden col-md-2" onchange="changeImg(this)">
                    <img id="anhSanPham" class="thubnail" width="30%;" height="30%;" alt="yourImage"
                        src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                </div>
                <div class="form-group">
                    <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Thêm">
                </div>
                <div class="form-group">
                    <a href="{{ asset('admin/history') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
