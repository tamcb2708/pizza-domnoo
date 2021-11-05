@extends('backend-view')
@section('tit', ' Thông Tin Bài Viết')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Xem Hoặc Sửa Thông Tin Bài Viết</h2>
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
                <form method="post" role="form" action="{{ asset('admin/blog/update-blog/' . $item->bl_id) }}"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Tên Bài Viết</label>
                        <input required type="text" name="name" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->bl_name }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Khóa Tìm Kiếm</label>
                        <input required type="text" name="bl_keyword" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->bl_keyword }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Khóa Url</label>
                        <input required type="text" name="bl_key_url" class="form-control col-md-4"
                            placeholder="Điền Thông Tin..." value="{{ $item->bl_key_url }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Tác Giả</label>
                        <input required type="text" name="author" class="form-control" placeholder="Điền Thông Tin..."
                            value="{{ $item->bl_author }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ảnh Chính Bài Viết</label>
                        <input required id="img" type="file" name="img1" class="form-control hidden col-md-2"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                            src="{{ asset('public/upload/image/' . $item->bl_img1) }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ảnh Bài Viết 2</label>
                        <input id="img" type="file" name="img2" class="form-control hidden col-md-2"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                            src="{{ asset('public/upload/image/' . $item->bl_img2) }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Ảnh Bài Viết 3</label>
                        <input id="img" type="file" name="img3" class="form-control hidden col-md-2"
                            onchange="changeImg(this)">
                        <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                            src="{{ asset('public/upload/image/' . $item->bl_img3) }}">
                        <hr>
                        <label class="label-domnoo-add col-md-3">Tiêu Đề</label>
                        <textarea class="ckeditor" name="title" style="width: 100%; height: 100%" name="description"
                            placeholder="Điền Thông Tin">{!! $item->bl_title !!}</textarea>
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
                        <input type="hidden" name="status" value="{{ $item->bl_status }}">
                        <input type="hidden" name="comment" value="{{ $item->bl_comment }}">
                        <input type="hidden" name="desc1" value="{{ $item->bl_desc1 }}">
                        <input type="hidden" name="desc2" value="{{ $item->bl_desc2 }}">
                        <input type="hidden" name="desc3" value="{{ $item->bl_desc3 }}">
                        <input type="hidden" name="desc4" value="{{ $item->bl_desc4 }}">
                        <input type="hidden" name="desc5" value="{{ $item->bl_desc5 }}">
                        {{-- <input type="hidden" name="comment" value="{{$item->bl_comment}}"> --}}
                        <label class="label-domnoo-add col-md-3">Đoạn 1</label>
                        <textarea class="ckeditor" name="desc1" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->bl_desc1 !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3">Đoạn 2</label>
                        <textarea class="ckeditor" name="desc2" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->bl_desc2 !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3">Đoạn 3</label>
                        <textarea class="ckeditor" name="desc3" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->bl_desc3 !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3">Đoạn 4</label>
                        <textarea class="ckeditor" name="desc4" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->bl_desc4 !!}</textarea>
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
                        <label class="label-domnoo-add col-md-3">Đoạn 5</label>
                        <textarea class="ckeditor" name="desc5" style="width: 100%; height: 100%" required
                            name="description" placeholder="Điền Thông Tin">{!! $item->bl_desc5 !!}</textarea>
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
                            @foreach ($listcate as $cate)
                                <option value="{{ $cate->ca_id }}">{{ $cate->ca_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4"
                            value="Lưu">
                    </div>
                    <div class="form-group">
                        <a href="{{ asset('admin/blog') }}" class="form-control btn btn-warning col-md-4">Quay Về Trang
                            Trước</a>
                    </div>
                    {{ csrf_field() }}
                </form>
            @endforeach
        </div>
    </div>
@endsection
