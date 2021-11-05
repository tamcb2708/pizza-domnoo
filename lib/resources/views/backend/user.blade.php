@extends('backend-view')
@section('tit', 'Tài Khoản Dùng Admin')
@section('master')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="add-domnoo">Danh Sách Người Dùng</h2>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<h3 style="color:red;" class="text-alert">' . $message . '</h3>';
                Session::put('message', null);
            }
            ?>
            <div class="table-responsive">
                <a href="{{ asset('admin/register-auth') }}" class="btn btn-primary">Thêm Tài Khoản </a>
                <table class="table table-striped b-t b-light">
                    <thead class="thead-domnoo">
                        <tr>
                            <th style="width:20px;">
                            </th>
                             <th><p class="domnoo-name">Tên Người Dùng</p></th>
                             <th><p class="domnoo-name">Tài Khoản Email</p></th>
                             <th><p class="domnoo-name">Số Điện Thoại</p></th>
                             <th><p class="domnoo-name">Quyền author</p></th>
                             <th><p class="domnoo-name">Quyền admin</p></th>
                             <th><p class="domnoo-acction-1">Quyền user</p></th>
                            <th style="width:30px;"></th>
                        </tr>
                    </thead>
                    <tbody class="tbody-domnoo">
                        @foreach ($ite as $item)
                            <form action="{{ asset('admin/assign-role') }}" method="POST">
                                @csrf
                                <tr>
                                    <td class="domnoo-item-detail">
                                    </td>
                                    <td class="domnoo-item-detail">{{ $item->ad_name }}</td>
                                    <td class="domnoo-item-detail">{{ $item->ad_email }} <input type="hidden" name="admin_email"
                                            value="{{ $item->ad_email }}"> </td>
                                            <td class="domnoo-item-detail">{{ $item->ad_phone }} <input type="hidden" name="admin_id"
                                            value="{{ $item->ad_id }}"></td>
                                    <td class="domnoo-item-detail"><input type="checkbox" name="author_role"
                                            {{ $item->hasRole('author') ? 'checked' : '' }}></td>
                                            <td class="domnoo-item-detail"><input type="checkbox" name="admin_role"
                                            {{ $item->hasRole('admin') ? 'checked' : '' }}></td>
                                            <td class="domnoo-item-detail"><input type="checkbox" name="user_role"
                                            {{ $item->hasRole('user') ? 'checked' : '' }}></td>
                                    <td>
                                        <input type="submit" value="Phân Quyền" class="btn btn-sm btn-primary">
                                        <hr>
                                        <a class="btn btn-danger"
                                            href="{{ asset('admin/user/delete/' . $item->ad_id) }}">
                                            <i class="fas fa-fw fa-cog"></i>Xóa</a>
                                        <hr>
                                        <a class="btn btn-success"
                                            href="{{ asset('admin/user/impersonate/' . $item->ad_id) }}">  <span style="font-family: wingdings; font-size: 200%;">&#252;</span>Chuyển </a>
                                    </td>

                                </tr>
                            </form>

                        @endforeach
                    </tbody>
                </table>
                <div class="row pagination_style">
                    <div class="page_number">
                        <ul>
                            {{ $ite->links() }}
                        </ul>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

@endsection
