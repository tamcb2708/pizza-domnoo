@extends('backend-view')
@section('tit','Danh Sách Mã Giảm Giá')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Danh Sách Mã Giảm Giá</h2>
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
                              <a href="{{asset('admin/coupon/add-coupon')}}" class="btn btn-primary">Thêm Mã Giảm Giá</a>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                      
                                            <th>Tên Mã Giảm</th>
                                            <th>MÃ</th>
                                            <th>Số Tiền Giảm Or Phần Trăm</th>
                                            <th>Hình Thức</th>
                                            <th>Số Lượng</th>
                                            <th>Thời Gian</th>
                                            <th style="width: 30%;" >Tùy Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all as $da)
                                    <tr>
                                    <td>{{$da->con_name}} </td>
                                    <td>{{$da->con_code}}
                                    </td>
                                    <td>{{$da->con_number}}</td>
                                     <td>
                                         @if($da->con_condition==1)
                                          Giảm Giá Theo Phần Trăm
                                          @elseif($da->con_condition==2)
                                          Giảm Giá Theo Giá Tiền
                                          @elseif($da->con_condition==0)
                                          Chưa có Hình Thức Giảm Giá
                                          @endif
                                     </td>
                                     <td>{{$da->con_time}}</td>
                                    <td>{{date('d/m/Y H:i',strtotime($da->created_at))}}</td>
                                    <td>
                                        <a href="{{asset('admin/coupon/edit/'.$da->con_id)}}" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-edit"></span>
                                            Sửa
                                        </a>
                                        <a href="{{asset('admin/coupon/delete/'.$da->con_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span>Xóa Mã</a>
                                    </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection