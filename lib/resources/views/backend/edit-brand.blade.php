@extends('backend-view')
@section('tit',' Thông Tin Công Ty Hợp Tác')
@section('master')
    

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2>Xem Hoặc Sửa Thông Tin Hợp Tác</h2>
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
                                                              <form method="post" action="{{asset('admin/brand/update-brand/'.$item->bra_id)}}">
                                                                  <div class="form-group">
                                                                      <hr>
                                                                      {{-- <label style="background-color: #80a4bd; width: 100%;">Nhân Viên</label> --}}
                                                                      <label >Tên Công Ty</label>
                                                                      <input required type="text"  name="name" class="form-control" placeholder="Điền Thông Tin..." value="{{$item->bra_name}}">
                                                                      <hr>
                                    
                                                                      <label >Ảnh Đại Diện</label>
                                                                      <input required id="img" type="file"   name="image" class="form-control hidden" onchange="changeImg(this)">
                                                                      <img  id="anhSanPham" class="thubnail" width="20%;" height="20%;"  src="{{asset('public/Backend/Brand/'.$item->bra_image)}}">
                                                                      <hr>
                                                                
                                                                     
                                                                      <label >Tóm Tắt Thông Tin</label>
                                                                      <textarea class="ckeditor"  name="desc" style="width: 100%; height: 100%" required name="description" placeholder="Điền Thông Tin">{!!$item->bra_desc!!}</textarea>
                                                                      <script type="text/javascript">
                                                                          var editor = CKEDITOR.replace('description',{language:'vi',
                                                                          filebrowserImageBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Image',
                                                                          filebrowserFlashBrowseUrl:'../editor/ckefintor/ckefintor/ckefintor.html?Type=Flash',
                                                                          filebrowserImageUploadUrl:'../editor/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                                           filebrowserFlashUploadUrl:'../editor/public/ckefintor/ckefintor/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                                      });
                                                                      </script>
                                                                      <hr>
                                                                      <input type="hidden" name="status" value="{{$item->bra_status}}">
                                                                      
                            
                                                                  </div>
                                                                   <div class="form-group">
                                                                      
                                                                      <input required type="submit"  name="submit" class="form-control btn btn-primary"  value="Lưu">
                                                                  </div>
                                                                   <div class="form-group">
                                                                      <a href="{{asset('admin/brand')}}" class="form-control btn btn-danger">Quay Về Trang Trước</a>
                                                                  </div>
                                                                  {{csrf_field()}}
                                                              </form>
                                                              @endforeach
                
                

                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

@endsection