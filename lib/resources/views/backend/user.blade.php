@extends('backend-view')
@section('tit','Tài Khoản Dùng Admin')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Danh Sách Người Dùng</h2>
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-4">
                            </div>
                            {{-- <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" placeholder="search" name="" id="">
                                    <span>
                                        <button class="btn btn-sm btn-default" type="button">Go</button>
                                    </span>
                                </div>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <?php
                                 $message=Session::get('message');
                                 if($message){
                                     echo '<h3 style="color:red;" class="text-alert">'.$message.'</h3>';
                                     Session::put('message',null);
                                 }       
                            ?>
                            <a href="{{asset('admin/register-auth')}}" class="btn btn-primary">Thêm Tài Khoản </a>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th style="width:20px;">
                                            {{-- <label class="i-check m-b-zone" for="">
                                                <input type="checkbox"><i></i>
                                            </label> --}}
                                        </th>
                                        <th>Tên Người Dùng</th>
                                        <th>Tài Khoản Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Quyền author</th>
                                        <th>Quyền admin</th>
                                        <th>Quyền user</th>
                                        <th style="width:30px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ite as $item)
                                    <form action="{{asset('admin/assign-role')}}" method="POST">
                                        @csrf
                                        <tr>
                                            <td><table class="i-check m-b-none">
                                                {{-- <input type="checkbox" name="post[]"> --}}
                                                <i></i>
                                                </table>
                                            </td>
                                            <td>{{$item->ad_name}}</td>
                                            <td>{{$item->ad_email}} <input type="hidden" name="admin_email" value="{{$item->ad_email}}"> </td>
                                            <td>{{$item->ad_phone}} <input type="hidden" name="admin_id" value="{{$item->ad_id}}"></td>
                                            {{-- <td>{{$item->ad_password}}</td> --}}
                                            <td><input type="checkbox" name="author_role" {{$item->hasRole('author') ? 'checked': ''}} ></td>
                                            <td><input type="checkbox" name="admin_role" {{$item->hasRole('admin') ? 'checked': ''}}></td>
                                            <td><input type="checkbox" name="user_role" {{$item->hasRole('user') ? 'checked': ''}}></td>
                                            <td>
                                                <input type="submit" value="Phân Quyền" class="btn btn-sm btn-primary">
                                                <hr>
                                                <a class="btn btn-danger" href="{{asset('admin/user/delete/'.$item->ad_id)}}">Xóa</a>
                                                <hr>
                                                <a class="btn btn-success" href="{{asset('admin/user/impersonate/'.$item->ad_id)}}">Chuyển  </a>
                                            </td>
                                            
                                        </tr>
                                    </form>
                                        
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination_style">
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