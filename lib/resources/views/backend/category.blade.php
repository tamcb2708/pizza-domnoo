@extends('backend-view')
@section('tit','Danh Mục Sản Phẩm')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Danh Mục</h2>
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
                        <div class="panel-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label style="background-color: #80a4bd; width: 100%; padding: 15px 8px">Thêm danh mục  =======>   </label>
                                    <input required type="text"  name="name" class="form-control" placeholder="Đánh Tên Danh Mục...">
                                    <table >Chọn Danh Mục Cha</table>
                                     <select name="parent" class="form-control input-sm m-bot15">
                                    @foreach($cate as $ca)
                                    <option value="0">Không Có Danh Mục Cha</option>
                                    <option value="{{$ca->cate_id}}">{{$ca->cate_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    
                                    <input required type="submit"  name="submit" class="form-control btn btn-primary" placeholder="Ten danh muc..." value="thêm mới">
                                </div>
                                @csrf
                            </form>
                        </div>
                        <div class="table-responsive">
                            <?php
                                 $message=Session::get('message');
                                 if($message){
                                     echo '<h3 style="color:red;" class="text-alert">'.$message.'</h3>';
                                     Session::put('message',null);
                                 }       
                            ?>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr >
                                   <th>Tên Danh Mục</th>
                                   <th>Thời gian thêm danh mục</th>
                                   <th style="width: 30%;" >Tùy Chọn</th>
                               </tr>
                               </thead>
                               <tbody>
                                  @foreach($catelist as $cate)
                                   <tr>
                                   <td>{{$cate->cate_name}} </td>
                                   <td>{{date('d/m/Y H:i',strtotime($cate->created_at))}}</td>
                                   <td>
                                       <a href="{{asset('admin/category/edit/'.$cate->cate_id)}}" class="btn btn-warning">
                                           <span class="glyphicon glyphicon-edit"></span>
                                           Sửa Danh Mục
                                       </a>
                                       <a href="{{asset('admin/category/delete/'.$cate->cate_id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa  ?')" class="btn btn-danger"> <span class="glyphicon glyphicon-edit"></span> Xóa Danh Mục</a>
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