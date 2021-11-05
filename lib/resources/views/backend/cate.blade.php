@extends('backend-view')
@section('tit', 'Danh Mục Bài Viết')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Mục Bài Viết</h2>
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
                    <label class="label-domnoo-add col-md-3" >Thêm danh mục bài viết =======>
                    </label>
                    <input required type="text" name="names" class="form-control" placeholder="Đánh Tên Danh Mục...">
                </div>
                <div class="form-group">
                    <label class="label-domnoo-add col-md-3" >Mô tả danh mục bài viết
                        =======> </label>
                    <textarea class="ckeditor" name="description" style="width: 100%; height: 100%" required
                        placeholder="Mô tả danh mục bài viết"></textarea>
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
                    <input required type="submit" name="submit" class="form-control btn btn-primary"
                        placeholder="Ten danh muc..." value="thêm mới">
                </div>
                @csrf
            </form>
        </div>
        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên Danh Mục</th>
                        <th>Thời gian thêm danh mục</th>
                        <th style="width: 30%;">Tùy Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cate as $cate)
                        <tr>
                            <td>{{ $cate->ca_name }} </td>
                            <td>{{ date('d/m/Y H:i', strtotime($cate->created_at)) }}</td>
                            <td>
                                <a href="{{ asset('admin/cate/edit/' . $cate->ca_id) }}" class="btn btn-warning domnoo-action-2"> 
                                    <span style="font-family: wingdings; font-size: 200%;">&#252;</span>
                                    Sửa Danh Mục
                                </a>
                                <hr>
                                <a href="{{ asset('admin/cate/delete/' . $cate->ca_id) }}"
                                    onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger domnoo-action-2"> 
                                    <i class="fas fa-fw fa-cog"></i> Xóa Danh Mục</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row pagination_style">
                <div class="page_number">
                    <ul>
                        {{$ite->links()}}
                    </ul>
                </div>
            </div>

        </div>
    </div
@endsection
