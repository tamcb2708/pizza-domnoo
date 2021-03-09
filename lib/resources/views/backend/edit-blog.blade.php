@extends('backend-view')
@section('tit',' Thông Tin Bài Viết')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Xem Hoặc Sửa Thông Tin Bài Viết</h2>
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
                                                              <form method="post" action="{{asset('admin/blog/update-blog/'.$item->bl_id)}}">
                                                                  <div class="form-group">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Tên Bài Viết</label>
                                                                      <input required type="text"  name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->bl_name}}">
                                                                      <hr>
                                                                      <label >Tác Giả</label>
                                                                      <input required type="text"  name="author" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->bl_author}}">
                                                                      <hr>
                                                                      <label >Ảnh Chính Bài Viết</label>
                                                                      <input required id="img" type="file"   name="img1" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="20%;" height="20%;"  src="{{asset('public/Backend/Blog/'.$item->bl_img1)}}">
                                                                      <hr>
                                                                
                                                                      <label >Ảnh Bài Viết 2</label>
                                                                      <input required id="img" type="file"   name="img2" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="20%;" height="20%;"  src="{{asset('public/Backend/Blog/'.$item->bl_img2)}}">
                                                                      <hr>
                                                                      <label >Ảnh Bài Viết 3</label>
                                                                      <input required id="img" type="file"   name="img3" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="20%;" height="20%;"  src="{{asset('public/Backend/Blog/'.$item->bl_img3)}}">
                                                                      <hr>
                                                                      <label >Tiêu Đề</label>
                                                                      <textarea class="ckeditor"  name="title" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->bl_title!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <input type="hidden" name="status" value="{{$item->bl_status}}">
                                                                      <input type="hidden" name="comment" value="{{$item->bl_comment}}">
                                                                      <input type="hidden" name="desc1" value="{{$item->bl_desc1}}">
                                                                      <input type="hidden" name="desc2" value="{{$item->bl_desc2}}">
                                                                      <input type="hidden" name="desc3" value="{{$item->bl_desc3}}">
                                                                      <input type="hidden" name="desc4" value="{{$item->bl_desc4}}">
                                                                      <input type="hidden" name="desc5" value="{{$item->bl_desc5}}">
                                                                      {{-- <input type="hidden" name="comment" value="{{$item->bl_comment}}"> --}}
                                                                      <label >Đoạn 1</label>
                                                                      <textarea class="ckeditor" name="desc1" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->bl_desc1!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <label >Đoạn 2</label>
                                                                      <textarea class="ckeditor" name="desc2" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->bl_desc2!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <label >Đoạn 3</label>
                                                                      <textarea class="ckeditor" name="desc3" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->bl_desc3!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <label >Đoạn 4</label>
                                                                      <textarea class="ckeditor" name="desc4" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->bl_desc4!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                       <hr>
                                                                       <label >Đoạn 5</label>
                                                                       <textarea class="ckeditor" name="desc5" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->bl_desc5!!}</textarea>
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
                                                                        <option value="{{$cate->ca_id}}">{{$cate->ca_name}}</option>
                                                                       
                                                                        @endforeach
                        
                                                                    </select>
                                                                  </div>
                                                                   <div class="form-group">
                                                                      
                                                                      <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="Lưu">
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/blog')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                              @endforeach
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection