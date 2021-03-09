@extends('backend-view')
@section('tit','Thêm Thông Tin Nhân Viên')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Thêm Nhân Viên</h2>
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
                                                       
                                                              <form method="post" action="{{asset('admin/agent/save-agent')}}">
                                                                  <div class="form-group">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Tên Nhân Viên</label>
                                                                      <input required type="text"  name="name" class="form-control" value="{{old('name')}}" placeholder="Điền Thông Tin..." >
                                                                      <hr>
                                                                      <label >Địa Chỉ</label>
                                                                      <input required type="text"  name="address" class="form-control" value="{{old('address')}}" placeholder="Điền Thông Tin..." >
                                                                      <hr>
                                                                      <label >Tuổi</label>
                                                                      <input required type="text"  name="old" class="form-control" value="{{old('old')}}" placeholder="Điền Thông Tin..." >
                                                                      <hr>
                                                                      <label >Số Điện Thoại</label>
                                                                      <input required type="text"  name="phone" class="form-control" value="{{old('phone')}}" placeholder="Điền Thông Tin..." >
                                                                      <input type="hidden" name="facebook" value="">
                                                                      <input type="hidden" name="instar" value="">
                                                                      <input type="hidden" name="google" value="">
                                                                      <input type="hidden" name="twitters" value="">
                                                                      <input type="hidden" name="status" value="0">
                                                                      <hr>
                                                                      <label >Ảnh Nhân Viên</label>
                                                                      <input required id="img" type="file"   name="img" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="10%;" height="10%;" alt="yourImage" src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                                                              
                                    
                                                                  </div>
                                                                   <div class="form-group">
                                                                      
                                                                      <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="Lưu">
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/agent')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                        
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection