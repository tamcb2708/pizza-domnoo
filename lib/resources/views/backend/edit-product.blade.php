@extends('backend-view')
@section('tit','Sửa Thông Tin Sản Phẩm')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Xem Hoặc Sửa Thông Tin Chi Tiết Sản Phẩm</h2>
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
                                                              <form method="post" action="{{asset('admin/product/update-product/'.$item->pr_id)}}">
                                                                  <div class="form-group">
                                                                      
                                                                      <hr>
                                                                      <label >Tên Sản Phẩm</label>
                                                                      <input required type="text"  name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->pr_name}}">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Ảnh Sản Phẩm</label>
                                                                      <input required id="img" type="file"   name="img" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="20%;" height="20%;"  src="{{asset('public/Backend/SanPham/'.$item->pr_img)}}">
                                                                      <hr>
                                                                      <label >Giá Sản Phẩm</label>
                                                                      <input required type="text"  name="price" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->pr_price}}">
                                                                      <hr>
                                                                      <label >Giá Sản Phẩm Mới(Nếu Có)</label>
                                                                      <input required type="text"  name="pricenew" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->pr_pricenew}}">
                                                                      <hr>
                                                                      <label >Chọn Thêm Giá Tiền Khi Thêm Cỡ 12 inch(Nếu Có)</label>
                                                                      <input required type="text"  name="price1" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->pr_pricenew}}">
                                                                      <hr>
                                                                      <label >Chọn Thêm Giá Tiền Khi Thêm Cỡ 9 inch(Nếu Có)</label>
                                                                      <input required type="text"  name="price2" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->pr_pricenew}}">
                                                                      <hr>
                                                                      <label >Chọn Thêm Giá Tiền Khi Thêm Cỡ 7 inch(Nếu Có)</label>
                                                                      <input required type="text"  name="price3" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->pr_pricenew}}">
                                                                      <hr>
                                                                      <input type="hidden" name="status" value="{{$item->pr_status}}">
                                                                      <input type="hidden" name="sold" value="{{$item->pr_sold}}">
                                                                      <input type="hidden" name="view" value="{{$item->pr_view}}">
                                                                      <label >Thành Phần</label>
                                                                      <textarea class="ckeditor"  name="element" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->pr_element!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <label >Mô Tả Đoạn 1</label>
                                                                      <textarea class="ckeditor" name="desc1" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->pr_desc1!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <label >Mô Tả Đoạn 2</label>
                                                                      <textarea class="ckeditor" name="desc2" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->pr_desc2!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <label >Mô Tả Đoạn 3</label>
                                                                      <textarea class="ckeditor" name="desc3" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->pr_desc3!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <label >Đọc Thêm</label>
                                                                      <textarea class="ckeditor" name="more" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->pr_more!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <select required name="cate" class="form-control">
                                                                        @foreach($listcate as $cate)
                                                                        <option value="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
                                                                       
                                                                        @endforeach
                        
                                                                    </select>
                                                                    <hr>
                                                                  </div>
                                                                   <div class="form-group">
                                                                      
                                                                      <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="Lưu">
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/product')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                              @endforeach
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection