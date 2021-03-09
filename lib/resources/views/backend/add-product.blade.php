@extends('backend-view')
@section('tit','Thêm Sản Phẩm')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Thêm Sản Phẩm</h2>
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
                                                       
                                                              <form method="post" action="{{asset('admin/product/save-product')}}">
                                                                  <div class="form-group">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Tên Sản Phẩm</label>
                                                                      <input required type="text"  name="name" class="form-control" value="{{old('name')}}" placeholder="Điền Thông Tin..." >
                                                                      <hr>
                                                                      <label >Giá Tiền</label>
                                                                      <input required type="text"  name="price" class="form-control" value="{{old('time')}}" placeholder="Điền Thông Tin..." >
                                                                      <hr>
                                                                      <label >Ảnh( Bắt Có)</label>
                                                                      <input required id="img" type="file"   name="img" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="30%;" height="30%;" alt="yourImage" src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">  
                                                                      <hr>     
                                                                      <label >Thành Phần</label>
                                                                      <textarea class="ckeditor" name="element" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin"></textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                            
                                                                      <input type="hidden" name="desc1" value="">
                                                                      <input type="hidden" name="desc2" value="">
                                                                      <input type="hidden" name="desc3" value="">
                                                                      <input type="hidden" name="more" value="">
                                                                      <input type="hidden" name="sold" value="0">
                                                                      <input type="hidden" name="view" value="0">
                                                                      <input type="hidden" name="pricenew" value="">
                                                                      <input type="hidden" name="price1" value="">
                                                                      <input type="hidden" name="price2" value="">
                                                                      <input type="hidden" name="price3" value="">
                                                                      <input type="hidden" name="status" value="0">
                                                                      <hr>
                                                                      <label>Sản Phẩm Thuộc Danh Mục</label>
                                                                      <select required name="cate" class="form-control">
                                                                          @foreach($catelist as $cate)
                                                                          <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                                                                         
                                                                          @endforeach
                          
                                                                      </select>
                                                                
                                                              
                                    
                                                                  </div>
                                                                   <div class="form-group">
                                                                      
                                                                      <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="thêm">
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/product')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                        
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection