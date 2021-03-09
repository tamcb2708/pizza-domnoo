@extends('backend-view')
@section('tit','Sửa Thông Tin Nhân Viên')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Xem Hoặc Sửa Thông Tin Nhân Viên</h2>
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
                                                              <form method="post" action="{{asset('admin/agent/update-agent/'.$item->ag_id)}}">
                                                                  <div class="form-group">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Tên Nhân Viên</label>
                                                                      <input required type="text"  name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_name}}">
                                                                      <hr>
                                                                      <label >Địa Chỉ</label>
                                                                      <input required type="text"  name="address" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_address}}">
                                                                      <hr>
                                                                      <label >Tuổi</label>
                                                                      <input required type="text"  name="old" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_old}}">
                                                                      <hr>
                                                                      <label >Số Điện Thoại</label>
                                                                      <input required type="text"  name="phone" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_phone}}">
                                                                      <hr>
                                                                      <label >Link FaceBook Nhân Viên</label>
                                                                      <input required type="text"  name="facebook" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_facebook}}">
                                                                      <hr>
                                                                      <label >Link Twitters Nhân Viên</label>
                                                                      <input required type="text"  name="twitters" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_twitters}}">
                                                                      <hr>
                                                                      <label >Link Trang Cá Nhân</label>
                                                                      <input required type="text"  name="google" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_google}}">
                                                                      <hr>
                                                                      <label >Link Instagam</label>
                                                                      <input required type="text"  name="instar" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->ag_instar}}">
                                                                      <hr>
                                                                      <label >Ảnh Nhân Viên</label>
                                                                      <input required id="img" type="file"   name="img" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="20%;" height="20%;"  src="{{asset('public/Backend/NhanVien/'.$item->ag_img)}}">
                                                                      <hr>
                                                                      
                                    
                                                                  </div>
                                                                   <div class="form-group">
                                                                      
                                                                      <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="Lưu">
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/agent')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                              @endforeach
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection