@extends('backend-view')
@section('tit', 'Sửa Thông Tin Bài Viết')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Xem Hoặc Sửa Thông Tin Bài Viết</h2>
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
                <form method="post"  role="form" action="{{ asset('admin/history/update-history/' . $item->hi_id) }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Ảnh Bài Viết</label>
                        <input required id="img" type="file" name="img" class="form-control hidden col-md-2"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                            src="{{ asset('public/upload/image/' . $item->hi_img) }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Thời Gian</label>
                        <input required type="text" name="time" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->hi_time }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Khóa Tìm Kiếm</label>
                        <input required type="text" name="hi_keyword" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->hi_keyword }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Khóa Url</label>
                        <input required type="text" name="hi_key_url" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->hi_key_url }}">
                        <hr>
                        <input type="hidden" name="status" value="{{ $item->hi_status }}">
                        <label class="label-domnoo-add col-md-3" >Tiêu Đề</label>
                        <textarea class="ckeditor" name="title" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->hi_title !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3" >Đoạn 1</label>
                        <textarea class="ckeditor" name="desc1" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->hi_desc1 !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3" >Đoạn 2</label>
                        <textarea class="ckeditor" name="desc2" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->hi_desc2 !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3" >Đoạn 3</label>
                        <textarea class="ckeditor" name="desc3" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->hi_desc3 !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3" >Đoạn 4</label>
                        <textarea class="ckeditor" name="desc4" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->hi_desc4 !!}</textarea>
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
                        <a href="{{ asset('admin/history') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
