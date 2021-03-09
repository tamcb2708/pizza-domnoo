@extends('backend-view')
@section('tit','')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Danh Sách Tùy Chọn Thêm Của Pizza</h2>
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
                            <a href="{{asset('admin/extra/add-extra')}}" class="btn btn-primary">Thêm Tùy Chọn</a>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th style="width:20px;">
                                            {{-- <label class="i-check m-b-zone" for="">
                                                <input type="checkbox"><i></i>
                                            </label> --}}
                                        </th>
                                        <th>Tên Tùy Chọn</th>
                                        <th>Giá Thêm Tùy chọn</th>
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
                                            <td>{{$item->ex_name}}</td>
                                            <td>{{number_format($item->ex_price,0,',','.')}}</td>
                                            </span></td>
                                            <td>{{date('d/m/Y H:i',strtotime($item->created_at))}}</td>
                                            <td>
                                                <a href="{{asset('admin/extra/edit/'.$item->ex_id)}}" class="btn btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                    Xem Thông Tin Hoặc Sửa
                                                </a>
                                                <hr>
                                                <a href="{{asset('admin/extra/delete/'.$item->ex_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Xóa </a>
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