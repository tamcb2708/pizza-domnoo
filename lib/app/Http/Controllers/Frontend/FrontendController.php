<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Model\History;
use App\Model\Agent;
use App\Model\Blog;
use App\Model\Category;
use App\Model\Contact;
use App\Model\FeedBack;
use App\Model\Slide;
use App\Model\Product;
use App\Model\Rating;
use App\Model\Comment;
use App\Model\Bran;
use App\Model\Extra;
use App\Model\Cate;
use Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller  
{
    public function home(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $category=DB::table('pz-category')->orderBy('cate_id','ASC')->get();
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $slide=DB::table('pz-slide')->where('sl_status',0)->get();
        $blog=DB::table('pz-blog')->where('bl_status',0)->orderBy('bl_id','DESC')->get();
        $product_deal=DB::table('pz-product')->where('pr_status',0)->orderBy('pr_price','ASC')->take(8)->get();
        $product_day=DB::table('pz-product')->where('pr_status',0)->orderBy('pr_sold','ASC')->take(8)->get();
        $data['product_new']=DB::table('pz-product')->where('pr_status',0)
        ->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')
        ->orderBy('pr_id','desc')->take(8)->get();
        return view('frontend.index',$data)->with('meta_description',$meta_description)
        ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
        ->with('url_meta',$url_meta)->with('brand',$brand)->with('slide',$slide)
        ->with('product_deal',$product_deal)->with('product_day',$product_day)->with('blog',$blog)
        ->with('meta_title',$meta_title)->with('category',$category);
    }
    public function blog(Request $request){ 
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $blog=DB::table('pz-blog')->where('bl_status',0)->orderBy('bl_id','DESC')->take(4)->paginate(3);
        $blog1=DB::table('pz-blog')->where('bl_status',0)->orderBy('bl_id','ASC')->take(4)->get();
        $history=DB::table('pz-history')->where('hi_status',0)->orderBy('hi_id','DESC')->take(1)->get();
        $category=DB::table('pz-category')->orderBy('cate_id','DESC')->get();
        $cate=DB::table('pz-cate')->orderBy('ca_id','DESC')->get();
        return view('frontend.blog')->with('brand',$brand)->with('blog',$blog)->with('history',$history)->with('blog1',$blog1)->with('category',$category)->with('cate',$cate)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function about(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $history=DB::table('pz-history')->where('hi_status',0)->orderBy('hi_id','DESC')->take(4)->get();
        $agent=DB::table('pz-agent')->where('ag_status',0)->orderBy('ag_id','DESC')->take(8)->get();
        $feedback=DB::table('pz-feedback')->where('fe_status',0)->orderBy('fe_id','DESC')->take(6)->get();
        return view('frontend.about')->with('brand',$brand)->with('history',$history)->with('agent',$agent)->with('feedback',$feedback)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function contact(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        return view('frontend.contact')->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function menu(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $category=DB::table('pz-category')->orderBy('cate_id','DESC')->get();
        // $product=DB::table('pz-product')->orderBy('pr_id','DESC')->paginate(8);
        $data['items']=DB::table('pz-product')->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_id','desc')->paginate(8);
        $data['ite']=Product::where('pr_status',0)->paginate(8);

        if(isset($_GET['sort_by'])){
            $sort_by=$_GET['sort_by'];
            if($sort_by=='giam_dan'){
                $product=Product::where('pr_status',0)->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_price','DESC')->paginate(8)->appends(request()->query());
            }elseif($sort_by=='tang_dan'){
                $product=Product::where('pr_status',0)->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_price','ASC')->paginate(8)->appends(request()->query());
            }elseif($sort_by=='kytu_az'){
                $product=Product::where('pr_status',0)->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_name','DESC')->paginate(8)->appends(request()->query());
            }elseif($sort_by=='kytu_za'){
                $product=Product::where('pr_status',0)->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_name','ASC')->paginate(8)->appends(request()->query());
            }elseif($sort_by=='cu_nhat'){
                $product=Product::where('pr_status',0)->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('updated_at','DESC')->paginate(8)->appends(request()->query());
            }elseif($sort_by=='moi_nhat'){
                $product=Product::where('pr_status',0)->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('updated_at','ASC')->paginate(8)->appends(request()->query());
            }elseif($sort_by=='none'){
                $product=DB::table('pz-product')->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->where('pr_status',0)->orderBy('pr_id','DESC')->paginate(8);
            }
        }else{
            $product=DB::table('pz-product')->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->where('pr_status',0)->orderBy('pr_id','DESC')->paginate(8);
        }

        return view('frontend.menu',$data)->with('brand',$brand)->with('category',$category)->with('product',$product)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function gui_lien_he(Request $request){ 
        // $this->validate($request,[
        //     'name'=>'required|max:255',
        //     'phone'=>'required|max:255',
        //     'email'=>'required|max:255',
        //     'desc'=>'required|max:255',
        // ]); 
        // $data=$request->all();
        $today=Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s');
        $data=array();
    	$data['ct_name']=$request->name;
    	$data['ct_phone']=$request->phone;
    	$data['ct_email']=$request->email;
    	$data['ct_desc']=$request->desc;
    	DB::table('pz-contact')->insert($data);

        $to_name = $request->name;
        $to_email =	$request->email;
        $title_mail = "Cảm ơn bạn đã liên hệ với chúng tôi qua ". ' '. $request->phone;

        $data = array("name"=>"Mail từ khách hàng","body"=>"tam");

        Mail::send('frontend.send-mail', $data, function ($message) use ($title_mail,$to_email) 
        {
            $message->to($to_email)->subject($title_mail);
            $message->from($to_email,$title_mail);
        });

    	return Redirect::to('/lien-he.html')->with('message','trân trọng cảm ơn bạn đã liên hệ với chúng tôi');
    }
    public function chi_tiet_bai_viet($bl_id,Request $request){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $data['blog']=Blog::find($bl_id);   
        // $blog1=DB::table('pz-blog')->where('bl_status',0)->whereNotIn('bl_id',[$bl_id])->orderBy('bl_id','DESC')->take(4)->get();
        $blog1=DB::table('pz-blog')->where('bl_status',0)->whereNotIn('bl_id',[$bl_id])->orderBy('bl_id','DESC')->take(4)->get();
        $category=DB::table('pz-category')->orderBy('cate_id','DESC')->take(6)->get();
        $history=DB::table('pz-history')->where('hi_status',0)->orderBy('hi_id','ASC')->take(1)->get();
        $category1=DB::table('pz-category')->orderBy('cate_id','DESC')->get();
        $comment=DB::table('pz-comment')->where('comm_blog',$bl_id)->paginate(4);
        $com=Comment::where('comm_blog',$bl_id)->count();
        $blo=Blog::where('bl_id',$bl_id)->first();
        $category_blog=DB::table('pz-cate')->orderBy('ca_id','DESC')->get();
        $blo->bl_comment=$request->comvnxx;
		$blo->bl_view=$blo->bl_view+1;
		$blo->save(); 
        //seo
        $meta_description = $data['blog']->bl_title;
        $meta_keywords = $data['blog']->bl_keyword;
        $meta_title = $data['blog']->bl_name;
        $url_meta = $request->url();
        //seo
        return view('frontend.blog-detail',$data)->with('brand',$brand)
        ->with('com',$com)->with('comment',$comment)->with('blog1',$blog1)
        ->with('category',$category)->with('history',$history)
        ->with('blog1',$blog1)->with('category1',$category1)
        ->with('meta_description',$meta_description)
        ->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)
        ->with('meta_title',$meta_title)
        ->with('category_blog',$category_blog)
        ;
    }
    public function gioi_thieu_chi_tiet($hi_id,Request $request){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $data['about']=History::find($hi_id);
        //seo
        $meta_description = $data['about']->hi_title;
        $meta_keywords =$data['about']->hi_keyword;
        $meta_title = $data['about']->hi_time;
        $url_meta = $request->url();
        //seo
        $about1=DB::table('pz-history')->where('hi_status',0)->whereNotIn('hi_id',[$hi_id])->orderBy('hi_id','DESC')->take(4)->get();
        $category1=DB::table('pz-category')->orderBy('cate_id','DESC')->get();
        $blog1=DB::table('pz-blog')->where('bl_status',0)->orderBy('bl_id','DESC')->take(4)->get();
        $category=DB::table('pz-category')->orderBy('cate_id','DESC')->take(6)->get();
        return view('frontend.about-detail',$data)->with('brand',$brand)->with('about1',$about1)->with('category',$category)->with('category1',$category1)->with('blog1',$blog1)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function danh_muc_san_pham($cate_id,Request $request){
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $category=DB::table('pz-category')->whereNotIn('cate_id',[$cate_id])->orderBy('cate_id','DESC')->get();
        $data['cate_name']=Category::find($cate_id);
        $product=DB::table('pz-product')->where('pr_cate',$cate_id)->orderBy('pr_id','DESC')->paginate(8);
        $data['items']=DB::table('pz-product')->where('pr_cate',$cate_id)->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_id','desc')->paginate(8);
        $data['ite']=Product::where('pr_status',0)->where('pr_cate',$cate_id)->paginate(8);
        foreach($category as $key =>$val){
                    //seo
           $meta_description = $val->meta_description;
           $meta_keywords = $val->meta_keyword;
           $url_meta = $request->url();
                   //seo
           $meta_description =  $val->meta_description;
           $meta_keywords = $val->meta_keyword;
           $meta_title =$val->meta_description;
           $url_meta = $request->url();
       //seo
        //seo
        }
        return view('frontend.category',$data)->with('brand',$brand)->with('category',$category)->with('product',$product)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function danh_muc_bai_viet($ca_id,Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $blog=DB::table('pz-blog')->where('bl_cate',$ca_id)->where('bl_status',0)->orderBy('bl_id','DESC')->take(4)->paginate(3);
        $blog1=DB::table('pz-blog')->where('bl_status',0)->orderBy('bl_id','ASC')->take(4)->get();
        $history=DB::table('pz-history')->where('hi_status',0)->orderBy('hi_id','DESC')->take(1)->get();
        $category=DB::table('pz-category')->orderBy('cate_id','DESC')->get();
        $cate=DB::table('pz-cate')->whereNotIn('ca_id',[$ca_id])->orderBy('ca_id','DESC')->get();
        $category_blog=Cate::find($ca_id);
        return view('frontend.cate')->with('brand',$brand)->with('blog',$blog)
        ->with('history',$history)->with('blog1',$blog1)->with('category',$category)
        ->with('cate',$cate)->with('meta_description',$meta_description)
        ->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)
        ->with('meta_title',$meta_title)
        ->with('category_blog',$category_blog)
        ;
    }
    public function chi_tiet_san_pham($pr_id,Request $request){
        $rim=DB::table('pz-rim')->get();
        $extra=DB::table('pz-extra')->get();
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        $data['item']=Product::find($pr_id);
    //seo
        $meta_description = $data['item']->pr_desc1;
        $meta_keywords =$data['item']->pr_keyword;
        $meta_title = $data['item']->pr_name;
        $url_meta = $request->url();
    //seo
        $productt=DB::table('pz-product')->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->where('pz-product.pr_id',$pr_id)->orderBy('pr_id','desc')->get();
		foreach ($productt as $key => $value) {
			$category=$value->pr_cate;
		} 
		$relate=DB::table('pz-product')->where('pr_cate',1)->where('pr_status',0)->whereNotIn('pr_id',[$pr_id])->orderBy('pr_id','desc')->take(3)->get();
		$items=DB::table('pz-product')
		->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')
		->where('pz-category.cate_id',$category)
		->where('pz-product.pr_status',0)
		->whereNotIn('pz-product.pr_id',[$pr_id])
		->orderBy('pr_id','desc')
		->take(3) 
		->get();
		$rating=Rating::where('product_id',$pr_id)->avg('rating');
		$rating=round($rating);
		$pro=Product::where('pr_id',$pr_id)->first();
        $ra=Rating::where('product_id',$pr_id)->sum('rating');
		$pro->pr_view=$pro->pr_view+1;
		$pro->save();
        return view('frontend.product-detail',$data)->with('extra',$extra)->with('rim',$rim)->with('brand',$brand)->with('items',$items)->with('rating',$rating)->with('ra',$ra)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);   }
    public function dang_nhap(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.login')->with('brand',$brand)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta);
    }
    public function insert_rating(Request $request){
		$data=$request->all();
		$rating=new Rating();
		$rating->product_id=$data['product_id'];
		$rating->rating=$data['index'];
		$rating->save();
		echo 'done';
	}
    public function post_comment_blog(Request $request,$bl_id){
		$comment=new Comment;
        $this->validate($request,[
            'nem'=>'required|max:255',
            'ema'=>'required|max:255',
            'con'=>'required|max:255',
        ]);
		$comment->comm_name=$request->nem;
		$comment->comm_email=$request->ema;
		$comment->comm_content=$request->con;
		$comment->comm_blog=$bl_id;
		$comment->save();
		return back();
	}
    public function huong_dan_mua_hang(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.huong-dan-mua-hang')->with('brand',$brand)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function dieu_khoan(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.dieu-khoan')->with('brand',$brand)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function chinh_sach_khuyen_mai(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.chinh-sach-khuyen-mai')->with('brand',$brand)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function huong_dan_su_dung(Request $request){
        //seo
           $meta_description = "tamccctamccctamccctamccctamccctamccctamccctamccctamccctamccc";
           $meta_keywords = "tamcc,tamccc,tamcc3,tamc2";
           $meta_title = "tamccctamccctamccc";
           $url_meta = $request->url();
        //seo
        $brand=DB::table('pz-brand')->where('bra_status',0)->get();
        return view('frontend.huong-dan-su-dung')->with('brand',$brand)->with('meta_description',$meta_description)->with('meta_keywords',$meta_keywords)->with('url_meta',$url_meta)->with('meta_title',$meta_title);
    }
    public function error_page(){
        return view('errors.404');
    }
    public function test_mail(){
        return view('frontend.send-mail');
    }
}
