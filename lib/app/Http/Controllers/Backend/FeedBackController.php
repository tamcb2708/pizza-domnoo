<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FeedBack;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
class FeedBackController extends Controller
{
    public function add_feedback()
    {
    	return view('backend.add-feedback');

    }
    public function get_feedback()
    {
        $data['items']=DB::table('pz-feedback')->orderBy('fe_id','desc')->paginate(4);
        $data['ite']=FeedBack::orderBy('fe_id','DESC')->paginate(4);
    	return view('backend.feedback',$data);
    }
    public function save_feedback(Request $request)
    {
    	$data=array();
    	$data['fe_name']=$request->name;
        $data['fe_img']=$request->img;
    	$data['fe_status']=$request->status;
        $data['fe_desc']=$request->desc;

    	DB::table('pz-feedback')->insert($data);
    	Session::put('message','Thêm Phản Hồi Khách Hàng Thành công');
    	return Redirect::to('admin/feedback/add-feedback');
    }

    public function active($fe_id)
    {
        DB::table('pz-feedback')->where('fe_id',$fe_id)->update(['fe_status'=>1]);
        Session::put('message','Không Hiển Thị Thành Công');
        return Redirect::to('admin/feedback');
    }
    public function actived($fe_id)
    {
        DB::table('pz-feedback')->where('fe_id',$fe_id)->update(['fe_status'=>0]);
        Session::put('message','Hiển Thị Thành Công');
        return Redirect::to('admin/feedback');
    }
    public function edit_feedback($fe_id)
    {
        $all=DB::table('pz-feedback')->where('fe_id',$fe_id)->get();
        $data=view('backend.edit-feedback')->with('all',$all);
        return view('backend-view')->with('backend.edit-feedback',$data);
    }
    public function update_feedback($fe_id,Request $request)
    {
        $data=array();
        $data['fe_name']=$request->name;
        $data['fe_img']=$request->img;
    	$data['fe_status']=$request->status;
        $data['fe_desc']=$request->desc;
        DB::table('pz-feedback')->where('fe_id',$fe_id)->update($data);
        Session::put('message','Sửa Thông Tin Thành Công ');
        return Redirect::to('admin/feedback');
    }
    public function delete($fe_id)
    {
        DB::table('pz-feedback')->where('fe_id',$fe_id)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('admin/feedback');   
    }
}
