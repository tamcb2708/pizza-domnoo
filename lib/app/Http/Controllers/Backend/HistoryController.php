<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\History;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class HistoryController extends Controller
{
    public function add_history()
    { 
    	return view('backend.add-history');

    }
    public function get_history()
    {
        $data['items']=DB::table('pz-history')->orderBy('hi_id','desc')->paginate(4);
        $data['ite']=History::orderBy('hi_id','DESC')->paginate(4);
    	return view('backend.history',$data);
    }
    public function save_history(Request $request)
    {
    	$data=array();
    	$data['hi_img']=$request->img;
    	$data['hi_time']=$request->time;
    	$data['hi_status']=$request->status;
        $data['hi_title']=$request->title;
        $data['hi_desc1']=$request->desc1;
        $data['hi_desc2']=$request->desc2;
        $data['hi_desc3']=$request->desc3;
        $data['hi_desc4']=$request->desc4;

    	DB::table('pz-history')->insert($data);
    	Session::put('message','Thêm Bài Viết Thành Công');
    	return Redirect::to('admin/history/add-history');
    }

    public function active($hi_id)
    {
        DB::table('pz-history')->where('hi_id',$hi_id)->update(['hi_status'=>1]);
        Session::put('message','Không Hiển Thị Bài Viết Thành Công');
        return Redirect::to('admin/history');
    }
    public function actived($hi_id)
    {
        DB::table('pz-history')->where('hi_id',$hi_id)->update(['hi_status'=>0]);
        Session::put('message','Hiển Thị Bài Viết Thành Công');
        return Redirect::to('admin/history');
    }
    public function edit_history($hi_id)
    {
        $all=DB::table('pz-history')->where('hi_id',$hi_id)->get();
        $data=view('backend.edit-history')->with('all',$all);
        return view('backend-view')->with('backend.edit-history',$data);
    }
    public function update_history($hi_id,Request $request)
    {
        $data=array();
        $data['hi_img']=$request->img;
        $data['hi_time']=$request->time;
        $data['hi_status']=$request->status;
        $data['hi_title']=$request->title;
        $data['hi_desc1']=$request->desc1;
        $data['hi_desc2']=$request->desc2;
        $data['hi_desc3']=$request->desc3;
        $data['hi_desc4']=$request->desc4;
        DB::table('pz-history')->where('hi_id',$hi_id)->update($data);
        Session::put('message','Sửa Thông Tin Bài Viết Thành Công ');
        return Redirect::to('admin/history');
    }
    public function delete($hi_id)
    {
        DB::table('pz-history')->where('hi_id',$hi_id)->delete();
        Session::put('message','Xóa Bài Viết Thành Công');
        return Redirect::to('admin/history');   
    }
}
