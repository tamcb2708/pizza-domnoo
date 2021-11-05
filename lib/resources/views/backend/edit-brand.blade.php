@extends('backend-view')
@section('tit', ' Thông Tin Công Ty Hợp Tác')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Xem Hoặc Sửa Thông Tin Hợp Tác</h2>
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
                <form method="post" role="form" action="{{ asset('admin/brand/update-brand/' . $item->bra_id) }}" enctype="multipart/form-data">
                    <div class="form-group">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Tên Công Ty</label>
                        <input required type="text" name="name" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->bra_name }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Link Công Ty</label>
                        <input required type="text" name="bra_link" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->bra_link }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ngày Bắt Đầu</label>
                        <input required type="text" name="bra_start" class="form-control col-md-4" placeholder="Điền Thông Tin..."
                            value="{{ $item->bra_start }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ngày Kết Thúc</label>
                        <input required type="text" name="bra_end" class="form-control col-md-4" placeholder="Điền Thông Tin..."
                            value="{{ $item->bra_end }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ảnh Đại Diện</label>
                        <input required id="img" type="file" name="image" class="form-control hidden col-md-2"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                            src="{{ asset('public/upload/image/' . $item->bra_image) }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Tóm Tắt Thông Tin</label>
                        <textarea class="ckeditor" name="desc" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->bra_desc !!}</textarea>
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
                        <input type="hidden" name="status" value="{{ $item->bra_status }}">
                    </div>
                    <div class="form-group">
                        <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4"
                        value="Lưu">
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/brand') }}"  class="form-control btn btn-warning col-md-4">Quay Về Trang
                            Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
