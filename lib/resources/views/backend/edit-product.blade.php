@extends('backend-view')
@section('tit', 'Sửa Thông Tin Sản Phẩm')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Xem Hoặc Sửa Thông Tin Chi Tiết Sản Phẩm</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
            <div class="table-responsive">
                @foreach ($all as $item)
                    <form method="post" role="form" action="{{ asset('admin/product/update-product/' . $item->pr_id) }} "
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Tên Sản Phẩm</label>
                            <input required type="text" name="name" class="form-control col-md-4"
                                placeholder="Điền Thông Tin..." value="{{ $item->pr_name }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Khóa Tìm Kiếm</label>
                            <input required type="text" name="pr_keyword" class="form-control"
                                placeholder="Điền Thông Tin..." value="{{ $item->pr_keyword }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Khóa Url</label>
                            <input required type="text" name="pr_url_key" class="form-control col-md-4"
                                placeholder="Điền Thông Tin..." value="{{ $item->pr_url_key }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Ảnh Sản Phẩm</label>
                            <input required id="img" type="file" name="img" class="form-control col-md-2 hidden"
                                onchange="changeImg(this)">
                            <img id="anhSanPham" class="thubnail" width="20%;" height="20%;"
                                src="{{ asset('public/upload/image/' . $item->pr_img) }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Giá Sản Phẩm</label>
                            <input required type="text" name="price" class="form-control col-md-4"
                                placeholder="Điền Thông Tin..." value="{{ $item->pr_price }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Giá Sản Phẩm Mới(Nếu Có)</label>
                            <input type="text" name="pricenew" class="form-control col-md-4" placeholder="Điền Thông Tin..."
                                value="{{ $item->pr_pricenew }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Chọn Thêm Giá Tiền Khi Thêm Cỡ 12 inch(Nếu Có)</label>
                            <input type="text" name="price1" class="form-control col-md-4" placeholder="Điền Thông Tin..."
                                value="{{ $item->pr_pricenew }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Chọn Thêm Giá Tiền Khi Thêm Cỡ 9 inch(Nếu Có)</label>
                            <input type="text" name="price2" class="form-control col-md-4" placeholder="Điền Thông Tin..."
                                value="{{ $item->pr_pricenew }}">
                            <hr>
                            <label class="label-domnoo-add col-md-3">Chọn Thêm Giá Tiền Khi Thêm Cỡ 7 inch(Nếu Có)</label>
                            <input type="text" name="price3" class="form-control col-md-4" placeholder="Điền Thông Tin..."
                                value="{{ $item->pr_pricenew }}">
                            <hr>
                            <input type="hidden" name="status" value="{{ $item->pr_status }}">
                            <input type="hidden" name="sold" value="{{ $item->pr_sold }}">
                            <input type="hidden" name="view" value="{{ $item->pr_view }}">
                            <label class="label-domnoo-add col-md-3">Thành Phần</label>
                            <textarea class="ckeditor" name="element" style="width: 100%; height: 100%" required
                                name="description" placeholder="Điền Thông Tin">{!! $item->pr_element !!}</textarea>
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
                            <label class="label-domnoo-add col-md-3">Mô Tả Đoạn 1</label>
                            <textarea class="ckeditor" name="desc1" style="width: 100%; height: 100%" required
                                name="description" placeholder="Điền Thông Tin">{!! $item->pr_desc1 !!}</textarea>
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
                            <label class="label-domnoo-add col-md-3">Mô Tả Đoạn 2</label>
                            <textarea class="ckeditor" name="desc2" style="width: 100%; height: 100%" required
                                name="description" placeholder="Điền Thông Tin">{!! $item->pr_desc2 !!}</textarea>
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
                            <label class="label-domnoo-add col-md-3">Mô Tả Đoạn 3</label>
                            <textarea class="ckeditor" name="desc3" style="width: 100%; height: 100%" required
                                name="description" placeholder="Điền Thông Tin">{!! $item->pr_desc3 !!}</textarea>
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
                            <label class="label-domnoo-add col-md-3">Đọc Thêm</label>
                            <textarea class="ckeditor" name="more" style="width: 100%; height: 100%" required
                                name="description" placeholder="Điền Thông Tin">{!! $item->pr_more !!}</textarea>
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
                            <label class="label-domnoo-add col-md-3">Sản Phẩm Thuộc Danh Mục</label>
                            <select required name="cate" class="form-control btn btn-primary form-control col-md-2">
                                @foreach ($listcate as $cate)
                                    <option value="{{ $cate->cate_id }}">{{ $cate->cate_name }}</option>
                                @endforeach
                            </select>
                            <hr>
                        </div>
                        <div class="form-group">
                            <input required type="submit" name="submit" class="form-control btn btn-primary col-md-4"
                                value="Lưu">
                        </div>
                        <div class="form-group">
                            <a href="{{ asset('admin/product') }}" class="form-control btn btn-warning col-md-4">Quay Về
                                Trang Trước</a>
                        </div>
                        {{ csrf_field() }}
                    </form>
                @endforeach
            </div>
        </div>
    @endsection
