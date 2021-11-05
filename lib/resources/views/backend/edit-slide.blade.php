@extends('backend-view')
@section('tit', 'Sửa Thông Tin Slide')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Xem Hoặc Sửa Thông Tin Slide</h2>
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
                <form method="post"  role="form" action="{{ asset('admin/slide/update-slide/' . $item->sl_id) }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Tiêu Đề 1</label>
                        <input required type="text" name="name" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->sl_name }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Ảnh Slide</label>
                        <input required id="img" type="file" name="img" class="form-control col-md-2 hidden"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                            src="{{ asset('public/upload/image/' . $item->sl_img) }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Tiêu Đề 2</label>
                        <textarea class="ckeditor" name="title" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->sl_title !!}</textarea>
                        <script type="text/javascript">
                            var editor = CKEDITOR.replace('description', {
                                language: 'vi',
                                filebrowserImageBrowseUrl: '../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                filebrowserFlashBrowseUrl: '../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                filebrowserImageUploadUrl: '../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                            });
                        </script>
                        <input type="hidden" name="status" value="{{ $item->sl_status }}">
                    </div>
                    <div class="form-group">
                        <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4" value="Lưu">
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/slide') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
