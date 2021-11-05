@extends('frontend-view')
@section('title','chi tiết bài viết')
@section('content')
        <section class="page-info new-block">
            <div class="fixed-bg" style="background: url('images/info-bg.jpg');"></div>
            <div class="overlay"></div>
            <div class="container">
                <h2>Blog single</h2>
                <div class="clear-fix"></div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{asset('/')}}">Trang Chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{asset('/bai-viet.html')}}">Bài Viết</a></li>
                </ol>
            </div>
        </section>
        <!-- banner -->

        <section class="blog-single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="bg-single">
                            <h2>{{$blog->bl_name}}</h2>
                            <div class="bg-single-new">
                                {!! $blog->bl_title !!}
                                <hr>
                                <div class="image-holder">
                                    <div class="holder-new">
                                        <div class="overlay"></div>
                                        <img height="350px" src="{{asset('public/upload/image/'.$blog->bl_img1)}}" alt="">
                                    </div>
                                    <ul>
                                        <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$blog->bl_id.'.html')}}"><i class="flaticon-profile"></i>{{$blog->bl_author}}</a></li>
                                        <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$blog->bl_id.'.html')}}"><i class="flaticon-chat"></i>{{$com}} Coments</a></li>
                                        <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$blog->bl_id.'.html')}}"><i class="flaticon-calendar"></i>{{$blog->created_at}}</a></li>
                                        <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$blog->bl_id.'.html')}}"><i class="flaticon-calendar"></i>{{$blog->bl_view}} Lượt Xem</a></li>
                                    </ul>
                                </div>
                                <input type="hidden" value="{{$com}}" name="comvnxx">
                                <div class="image-heading">
                                    <p>{!!$blog->bl_desc1!!}</p>
                                    <div class="holder-new">
                                        <div class="overlay"></div>
                                        @if($blog->bl_img2==null)
                                        @else
                                        <img height="350px" src="{{asset('public/upload/image/'.$blog->bl_img2)}}" alt="">
                                        @endif
                                    </div>
                                    <p>{!!$blog->bl_desc2!!}</p>
                                    <p>{!!$blog->bl_desc3!!}</p>
                                    <div class="holder-new">
                                        <div class="overlay"></div>
                                        @if($blog->bl_img3==null)
                                        @else
                                        <img height="350px" src="{{asset('public/upload/image/'.$blog->bl_img3)}}" alt="">
                                        @endif
                                    </div>
                                    <p>{!!$blog->bl_desc4!!}</p>
                                </div>
                                <div class="image-heading1 ">
                                    <i class="flaticon-left-quote"></i>
                                    <p>{!!$blog->bl_desc5!!}</p>
                                    <i class="flaticon-right-quotation-sign"></i>
                                </div>

                                <div class="image-heading2">
                                    <ul>
                                        <li><i class="flaticon-price-tag"></i></li>
                                        @foreach ($category as $item)
                                            
                                        <li><a href="{{asset('danh-muc-san-pham/'.$item->cate_id.'.html')}}">{{$item->cate_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!--image-heading2-->
                            <div class="image-heading3">
                                <h2>{{$com}} COMMENT :</h2>
                                @foreach ($comment as $item)
                                <div class="comment-block">
                                    <div class="comment">
                                        <img src="images/profile-pic.png" alt="">
                                    </div>
                                    <div class="comment-new">
                                        <ul>
                                            <li><i class="flaticon-profile"></i>{{$item->comm_name}}</li>
                                            <li><i class="flaticon-calendar"></i>{{$item->created_at}}</li>
                                        </ul>
                                        <a href="#">REPLY</a>
                                        <p>{{$item->comm_content}}</p>
                                    </div>
                                </div>
                                @endforeach
                                {{$comment->links()}}
                            </div>
                            <!--image heading3-->

                            <div class="leave-reply image-heading3">
                                <h2>Bình Luận Bài Viết :</h2>
                                @foreach ($errors->all() as $val)
                                <ul>
                                    <li>{{$val}}</li>
                                </ul>
                                    
                                @endforeach
                                <form  method="POST">
                                    @csrf
                                    <div class="form-group nm">
                                        <input type="text" placeholder="Name" name="nem" value="{{old('nem')}}" class="form-control">
                                    </div>
                                    <div class="form-group nm">
                                        <input type="email" placeholder="Email" name="ema" value="{{old('ema')}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <textarea placeholder="Write your comment.." name="con" value="{{old('con')}}" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn1 stl2">Bình Luận</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="history_slider owl-carousel owl-theme">
                                @foreach ($blog1 as $item)
                                <div class="item" >
                                    <div class="block-stl13" style="height: 300px">
                                        <div class="">
                                            <img height="300px" src="{{asset('public/upload/image/'.$item->bl_img1)}}" alt="" class="img-responsive">
                                        </div>
                                        <p>{{$item->bl_name}}</p>
                                        <hr>
                                        <a style="color:black" href="#"><i style="color: red" class="flaticon-profile"></i>{{$item->bl_author}}</a>
                                        <h3>{{$item->created_at}}</h3>
                                        <div class="txt-container">
                                            <a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}" class="btn1 stl2">Đọc Ngay</a>
                                        </div>
                                   
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        @foreach ($history as $item)
                        <div class="about">
                            <h2>Giới Thiệu</h2>
                            <div class="img-holder"><img src="{{asset('public/Backend/LichSu/'.$item->hi_img)}}" alt="" class="img-responsive"></div>
                            <h3><a href="{{asset('gioi-thieu/gioi-thieu-chi-tiet/'.$item->hi_id.'.html')}}">Xem Ngay</a></h3>
                            <p>{!!$item->hi_title!!}</p>
                        </div>
                        @endforeach

                        <div class="about">
                            <div class="about-new">
                                <h2>Bài Viết Mới</h2>
                                @foreach ($blog1 as $item)
                                <div class="nws">
                                    <a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><h4>{!!$item->bl_name!!}</h4></a>
                                    <p>{{$item->created_at}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="about">
                            <h2>Danh Mục Tin Tức</h2>
                            <ul>
                                @foreach ($category_blog as $category_blog)
                                    <li><i class="flaticon-right-arrow"></i><a href="{{asset('danh-muc-bai-viet/'.$category_blog->ca_id.'.html')}}">{{ $category_blog->ca_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="block_r">
                            <div class="block_r1">
                                <div class="overlay"></div>
                                <img src="images/pizzaaa.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <div class="content_container">
                                    <ul class="content_container_list">
                                        <li class="content_container_list_item">50% OFF PIZZAS ONLINE</li>
                                        <li class="content_container_list_item"> 50% OFF BURGER ONLINE</li>
                                        <li class="content_container_list_item">50% OFF SANDWICH ONLINE</li>
                                        <li class="content_container_list_item">50% OFF SANDWICH ONLINE</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="tags">
                            <h2>TAGS</h2>
                            <div class="tags-line">
                                <ul>
                                    @foreach ($category1 as $item)
                                    <li><a href="{{asset('danh-muc-san-pham/'.$item->cate_id.'.html')}}">{{$item->cate_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="great-thankful new-block">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="th-slider owl-theme owl-carousel">
							@foreach ($brand as $item)
						<div class="item">
							<div class="img-holder">
								<img src="{{asset('public/upload/image/'.$item->bra_image)}}" alt="" class="img-responsive img1">
								<img src="{{asset('public/upload/image/'.$item->bra_image)}}" alt="" class="img-responsive img2">
							</div>
						</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection