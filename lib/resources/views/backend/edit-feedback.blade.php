@extends('backend-view')
@section('tit', 'Sửa Thông Tin FeedBack')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Xem Hoặc Sửa Thông Tin FeedBack</h2>
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
                <form method="post" role="form" action="{{ asset('admin/feedback/update-feedback/' . $item->fe_id) }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <hr>
                        {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                        <label class="label-domnoo-add col-md-3" >Tên Khách Hàng</label>
                        <input required type="text" name="name" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->fe_name }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3" >Ảnh </label>
                        <input required id="img" type="file" name="img" class="form-control hidden"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="30%;" height="30%;"
                            src="{{ asset('public/upload/image/' . $item->fe_img) }}">
                        <hr>
                        <input type="hidden" name="status" value="{{ $item->fe_status }}">
                        <label class="label-domnoo-add col-md-3" >Tiêu Đề </label>
                        <textarea class="ckeditor" name="desc" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{{ $item->fe_desc }}</textarea>
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
                        <a href="{{ asset('admin/feedback') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
