@extends('frontend-view')
@section('title','bài viết')
@section('content')    


<section class="blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="bg-single">
                    @foreach ($blog as $item)
                    <div class="bg-single-neww">
                        <div class="image-holder">
                            <div class="holder-new">
                                <div class="overlay"></div>
                                <img src="{{asset('public/upload/image/'.$item->bl_img1)}}" alt="" class="img-responsive">
                            </div>
                            <ul>
                                <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><i class="flaticon-profile"></i>{{$item->bl_author}}</a></li>
                                {{-- <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><i class="flaticon-chat"></i>{{$item->bl_comment}}Coments</a></li> --}}
                                <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><i class="flaticon-calendar"></i>{{$item->created_at}}</a></li>
                                <li><a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><i class="flaticon-calendar"></i>{{$item->bl_view}} Lượt Xem</a></li>
                            </ul>
                        </div>
                        <div class="image-heading">
                            <a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><h2>{{$item->bl_name}}</h2></a>
                            <p>{!!$item->bl_title!!} <a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}">continue reading</a></p>
                        </div>
                    </div>
                    @endforeach


                    <div class="blog-pagination">
                        <ul class="pagination">
                            {{$blog->links()}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                @foreach ($history as $item)
                <div class="about">
                    <h2>Giới Thiệu</h2>
                    <div class="img-holder"><img src="{{asset('public/upload/image/'.$item->hi_img)}}" alt="" class="img-responsive"></div>
                    <h3><a href="{{asset('gioi-thieu/gioi-thieu-chi-tiet/'.$item->hi_id.'.html')}}">Xem Ngay</a></h3>
                    <p>{!!$item->hi_title!!}</p>
                </div>
                @endforeach

                <div class="about">
                    <div class="about-new">
                        <h2>Tin Tức Cũ Hơn</h2>
                        @foreach ($blog1 as $item)
                        <div class="nws">
                            <a href="{{asset('bai-viet/chi-tiet-bai/'.$item->bl_id.'.html')}}"><h4>{!!$item->bl_name!!}</h4></a>
                            <p>{{$item->created_at}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
 
                <div class="about">
                    <h2>Danh Mục Bài Viết</h2>
                    <ul>
                        @foreach ($cate as $item)
                            <li><i class="flaticon-right-arrow"></i><a href="{{asset('danh-muc-bai-viet/'.$item->ca_id.'.html')}}">{{$item->ca_name}}</a></li>
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
                                <li class="content_container_list_item">50% OFF BURGER ONLINE</li>
                                <li class="content_container_list_item">50% OFF SANDWICH ONLINE</li>
                                <li class="content_container_list_item">50% OFF SANDWICH ONLINE</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tags">
                    <h2>Danh Mục Sản Phẩm</h2>
                    <div class="tags-line">
                        <ul>
                            @foreach ($category as $item)
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