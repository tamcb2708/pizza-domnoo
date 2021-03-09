@extends('backend-view')
@section('tit','Thêm Mã Giảm Giá')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Thêm Mã Giảm Giá</h2>
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
                               <form method="post" action="{{asset('admin/coupon/save-coupon')}}">
                                <div class="form-group">
                                    <label style=" width: 100%; padding: 15px 8px">Tên Mã Giảm Giá</label>
                                    <input required type="text"  name="name" class="form-control" placeholder="Tên Mã Giảm Giá">
                                    <label style=" width: 100%; padding: 15px 8px">Mã Giảm Giá</label>
                                     <input required type="text"  name="code" class="form-control" placeholder="
                                    Mã Giảm Giá">
                                    <label style=" width: 100%; padding: 15px 8px">Chọn Số Lượng</label>
                                       <input min="1" max="100" name="time" value="" type="number"  class="cart_quantity">
                                       <label style=" width: 100%; padding: 15px 8px">Chọn Phương Thúc</label>
                                     <select class="form-control" name="condition">
                                         <option value="0">----Chọn----</option>
                                         <option value="1">Giảm Theo Phần Trăm</option>
                                         <option value="2">Giảm Theo Giá Tiên</option>
                                     </select>
                                     <label style=" width: 100%; padding: 15px 8px">Nhập</label>
                                      <input required type="text"  name="number" class="form-control" placeholder="
                                    Nhập Số Tiền Hoặc Phần Trăm Được Giảm">
                                </div>
                                 <div class="form-group">
                                    
                                    <input required type="submit"  name="addbrand" class="form-control btn btn-primary"  value="thêm mới">
                                    <hr>
                                     <a style="background-color:green;" href="{{asset('admin/coupon')}}" class="form-control btn btn-primary">Quay Về</a>
                                </div>
                                {{csrf_field()}}
                            </form>
                                                        
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection