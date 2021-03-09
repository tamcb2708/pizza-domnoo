<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Model\Blog;
use App\Model\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Statistical;
use App\Model\Visitor;
class HomeController extends Controller
{
    public function gethome(Request $request){
        $user_op_address=$request->ip();
        $early_last_month=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $early_this_month=Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $oneyears=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $visitor_of_lastmonth=Visitor::whereBetween('date_visitor',[$early_last_month,$end_of_last_month])->get();
        $visitor_last_month_count=$visitor_of_lastmonth->count();

        $visitor_of_thismonth=Visitor::whereBetween('date_visitor',[$early_this_month,$now])->get();
        $visitor_of_thismonth_count=$visitor_of_thismonth->count();

        $visitor_of_year=Visitor::whereBetween('date_visitor',[$oneyears,$now])->get();
        $visitor_of_year_count=$visitor_of_year->count();

        $visitor=Visitor::all();
        $visitor_total=$visitor->count();

        $visitors_current=Visitor::where('ip_address',$user_op_address)->get();
        $visitors_count=$visitors_current->count();
        if($visitors_count<1){
            $visitor=new Visitor();
            $visitor->ip_address=$user_op_address;
            $visitor->date_visitor= Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
        $product_view=Product::orderBy('pr_view','DESC')->take(10)->get();
        $blog_view=Blog::orderBy('bl_view','DESC')->take(13)->get();
        $pro=Product::orderBy('pr_sold','DESC')->take(10)->get();

    	return view('backend.index')->with(compact('visitors_count','visitor_total','visitor_of_year_count','visitor_of_thismonth_count','visitor_last_month_count','product_view','blog_view','pro'));
    }
    // public function logout(){
    // 	Auth::logout();
    // 	return redirect()->intended('admin');
    //     // return view('backend.login');
    // }
    public function Comment(){
    	 $data['list']=DB::table('vp-comment')->join('vp-products','vp-comment.com_product','=','vp-products.prod_id')->orderBy('com_id','desc')->get();
         $data['list1']=DB::table('vp-comment-blog')->join('vp-blog','vp-comment-blog.comm_blog','=','vp-blog.bl_id')->orderBy('comm_id','desc')->get();

    	return view('backend.Comment',$data);
    }
    public function fiter_by_date(Request $request){
        $data=$request->all();
        $from_date=$data['from_date'];
        $to_date=$data['to_date'];
        $get=Statistical::whereBetween('order_date',[ $from_date,$to_date ])->orderBy('order_date','ASC')->get();
        // $gs=Statistical::where('order_date',[$to_date])->get();
        foreach ($get as $key => $val) {
            # code...
            $chart_data[] = array(
                'period'=>$val->order_date,
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity
             );
        }
        // // print_r($to_date);
        echo $data = json_encode($chart_data);
        // echo [$from_date,$to_date];
        // echo ($data);
    }
    public function dashboard_filter(Request $request){
        $data=$request->all();

        $dauthangnay=Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){
            $get=Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value']=='thangtruoc'){
            $get=Statistical::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value']=='thangnay'){
            $get=Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $get=Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }
        foreach ($get as $key => $val) {
            # code...
            $chart_data[] = array(
                'period'=>$val->order_date,
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity
             );
        }
        echo $data=json_encode($chart_data);
    }
    public function days_order(){
        $sub365days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get=Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
           foreach ($get as $key => $val) {
            # code...
            $chart_data[] = array(
                'period'=>$val->order_date,
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity
             );
        }
        echo $data=json_encode($chart_data);
    }
    public function getSearch(Request $request){
		$result = $request->result;
		$data['keyword']=$result;
		$result = str_replace(' ','%', $result);
		$data['items']=Product::where('pr_name','like','%'.$result.'%')->paginate(4);
		return view('backend.search',$data);
	}
}
