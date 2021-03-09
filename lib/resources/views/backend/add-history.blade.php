@extends('backend-view')
@section('tit','Bài Viết ')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Thêm Bài Viết</h2>
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
                                                       
                                                              <form method="post" action="{{asset('admin/history/save-history')}}">
                                                                  <div class="form-group">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Thời Gian</label>
                                                                      <input required type="text"  name="time" class="form-control" value="{{old('time')}}" placeholder="Điền Thông Tin..." >
                                                                      <hr>
                                                                      <label >Tiêu Đề</label>
                                                                      <textarea class="ckeditor" name="title" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin"></textarea>
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
                                                                      <input type="hidden" name="desc4" value="">
                                                                      <input type="hidden" name="status" value="0">
                                                                      <hr>
                                                                      <label >Ảnh( Bắt Có)</label>
                                                                      <input required id="img" type="file"   name="img" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="30%;" height="30%;" alt="yourImage" src="https://studios.vn/wp-content/uploads/2015/11/anh-thoi-trang-trong-studio-3.jpg">
                                                              
                                    
                                                                  </div>
                                                                   <div class="form-group">
                                                                      
                                                                      <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="thêm">
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/history')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                        
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection