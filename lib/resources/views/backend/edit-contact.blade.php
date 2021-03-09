@extends('backend-view')
@section('tit','Thông Tin Chi Tiết')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Xem Thông Tin Chi Tiết</h2>
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
                                                              @foreach($all as $item)
                                                              <form method="post" >
                                                                  <div class="form-group">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Tên Khách Hàng</label>
                                                                      <input required type="text" readonly name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ct_name}}">
                                                                      <hr>
                                                                      <label >Email Khách Hàng</label>
                                                                      <input required type="text" readonly name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ct_email}}">
                                                                      <hr>
                                                                      <label >Số Điện Thoại Khách Hàng</label>
                                                                      <input required type="text" readonly name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ct_phone}}">
                                                                      <hr>
                                                                      <label >Ngày Gửi</label>
                                                                      <input required type="text" readonly name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->created_at}}">
                                                                      <hr>
                                                                      <label >Lời Nhắn</label>
                                                                      <textarea class="ckeditor" readonly name="title" style="width: 100%; height: 100%" required placeholder="Điền Thông Tin">{!!$item->ct_desc!!}</textarea>
                                                                      
                                    
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/contact')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                              @endforeach
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection