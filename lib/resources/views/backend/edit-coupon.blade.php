@extends('backend-view')
@section('tit','Sửa Mã Giảm Giá')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2> Thông Tin Chi Tiết</h2>
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
                                                          @foreach($all as $da)
                                                          <form method="post" action="{{asset('admin/coupon/update-coupon/'.$da->con_id)}}">
                                                              <div class="form-group">
                                                               
                                                                  <label style="width: 100%; padding: 15px 8px">Tên Mã Giảm Giá</label>
                                                                  <input required type="text" value="{{$da->con_name}}" name="name" class="form-control" placeholder="Ten ma giam gia">
                                                                  <label style="width: 100%; padding: 15px 8px"> Mã Giảm Giá</label>
                                                                   <input required type="text"  name="code" value="{{$da->con_code}}" class="form-control" placeholder="
                                                                  ma giam gia">
                                                                  <label style="width: 100%; padding: 15px 8px">Số Lượng</label>
                                                                     <input min="1" max="100" name="number" value="{{$da->con_number}}" type="number"  class="cart_quantity">
                                                                     <label style="width: 100%; padding: 15px 8px">Phương Thức Giảm</label>
                                                                   <select class="form-control"  name="condition">
                                                                       <option value="0">{{$da->con_condition}}</option>
                                                                       <option value="1">Giảm Theo Phần Trăm</option>
                                                                       <option value="2">Giảm Theo Giá Tiền</option>
                                                                       <option value="3"></option>
                                                                   </select>
                                                                   <label style="width: 100%; padding: 15px 8px">Thời Gian</label>
                                                                    <input required type="text"  name="time" value="{{$da->con_time}}" class="form-control" placeholder="
                                                                  nhap so phan tram hoac so tien giam">
                                                           
                                                              </div>
                                                               <div class="form-group">
                                                                  
                                                                  <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="Lưu">
                                                              </div>
                                                               <div class="form-group">
                                                                  <a href="{{asset('admin/coupon')}}" class="form-control btn btn-danger">Hủy Bỏ</a>
                                                              </div>
                                                              {{csrf_field()}}
                                                          </form>
                                                          @endforeach
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection