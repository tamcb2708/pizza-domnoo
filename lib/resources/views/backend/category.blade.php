@extends('backend-view')
@section('tit', 'Danh Mục Sản Phẩm')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Danh Mục</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
        </div>
        <div class="panel-body">
            <form method="POST">
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3">tên danh mục =======> </label>
                    <input required type="text" name="name" class="form-control" placeholder="Đánh Tên Danh Mục...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Mô tả =======> </label>
                    <textarea class="ckeditor" name="meta_description" style="width: 100%; height: 100%" required
                        placeholder="Mô tả danh mục sản phẩm"></textarea>
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
                    <input required type="text" name="meta_keywords" class="form-control"
                        placeholder="Từ khóa danh mục sản phẩm...">
                    <hr>
                    <input required type="text" name="cate_key_url" class="form-control"
                    placeholder="Từ khóa url danh mục sản phẩm...">
                    <hr>
                    <input required type="text" name="cate_icon" class="form-control"
                    placeholder="Icon danh mục sản phẩm...">
                    <hr>
                    <label class="label-domnoo-add col-md-3">Chọn Danh Mục Cha</table>
                        <select name="parent" class="form-control input-sm m-bot15">
                            @foreach ($cate as $ca)
                                <option value="0">Không Có Danh Mục Cha</option>
                                <option value="{{ $ca->cate_id }}">{{ $ca->cate_name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <input required type="submit" name="submit" class="form-control btn btn-primary" value="thêm mới">
                </div>
                @csrf
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên Danh Mục</th>
                        <th>Từ khóa tìm kiếm</th>
                        <th>Từ khóa key url</th>
                        <th>Thời gian cập nhập</th>
                        <th style="width: 30%;">Tùy Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catelist as $cate)
                        <tr>
                            <td>{{ $cate->cate_name }} </td>
                            <td>{{ $cate->meta_keyword }}</td>
                            <td>{{ $cate->cate_key_url }}</td>
                            {{-- <td>{{ $cate->meta_description }}</td> --}}
                            <td>{{ date('d/m/Y H:i', strtotime($cate->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/category/edit/' . $cate->cate_id) }}"class="btn btn-warning domnoo-action-2"> 
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Sửa Danh Mục
                                </a>
                                <a href="{{ asset('admin/category/delete/' . $cate->cate_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger domnoo-action-2"> 
                                    <i class="fas fa-fw fa-cog"></i>Xóa Danh Mục
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
