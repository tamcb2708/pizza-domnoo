@extends('backend-view')
@section('tit','FeedBack Của Khách Hàng')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Danh Sách FeedBack</h2>
                        </div>
                        <div class="row w3-res-tb">
                            {{-- <div class="col-sm-5 m-b-xs">
                                <select name="" id="" class="input-sm form-control w-sm inline v-middle">
                                    <option value="0">Bulk action</option>
                                    <option value="1">Delete selectd</option>
                                    <option value="2">Bulk edit</option>
                                    <option value="3">Export</option>
                                </select>
                                {{-- <button class="btn btn-sm btn-default">Apply</button> --}}
                            </div>
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-3">
                                {{-- <div class="input-group">
                                    <input type="text" class="input-sm form-control" placeholder="search" name="" id="">
                                    <span>
                                        <button class="btn btn-sm btn-default" type="button">Go</button>
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                        <div class="table-responsive">
                            <?php
                                 $message=Session::get('message');
                                 if($message){
                                     echo '<h3 style="color:red;" class="text-alert">'.$message.'</h3>';
                                     Session::put('message',null);
                                 }       
                            ?>
                            <a href="{{asset('admin/feedback/add-feedback')}}" class="btn btn-primary">Thêm FeedBack </a>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th style="width:20px;">
                                            {{-- <label class="i-check m-b-zone" for="">
                                                <input type="checkbox"><i></i>
                                            </label> --}}
                                        </th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Hình Ảnh</th>
                                        <th>Trạng Thái Hiển Thị</th>
                                        <th>Tóm Tắt</th>
                                        <th>Ngày Thêm</th>
                                        <th>Chức Năng</th>
                                        <th style="width:30px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td><table class="i-check m-b-none">
                                                {{-- <input type="checkbox" name="post[]"> --}}
                                                <i></i>
                                                </table>
                                            </td>
                                            <td>{{$item->fe_name}}</td>
                                            <td><img width="150px" src="{{asset('public/Backend/FeedBack/'.$item->fe_img)}}" class="thumbnail"></td>
                                            <td><span class="text-ellipsis">
                                                <?php
                                                if($item->fe_status==0){
                                                ?>
                                            <a href="{{asset('admin/feedback/active/'.$item->fe_id)}} " onclick="return confirm('Bạn đã không để hiển thị feedback của khách ')"><span class="fa fa-thumbs-up"></span></a>

                                               <?php
                                           }else{
                                            ?>
                                            <a href="{{asset('admin/feedback/actived/'.$item->fe_id)}}" onclick="return confirm('Bạn đã để hiển thị feedback  ')"><span class="fa fa-thumbs-down"></span></a>

                                               <?php
                                           }
                                                ?>
                                            </span></td>
                                            <td>{!!$item->fe_desc!!}</td>
                                            <td>{{date('d/m/Y H:i',strtotime($item->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/feedback/edit/'.$item->fe_id)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Xem Thông Tin Hoặc Sửa
                                                </a>
                                                <hr>
                                                <a href="{{asset('admin/feedback/delete/'.$item->fe_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Xóa FeedBack</a>
                                            </td>
                                            
                                        </tr>                  
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