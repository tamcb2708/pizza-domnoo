<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Slide;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class SlideController extends Controller
{
    public function add_slide()
    {
    	return view('backend.add-slide');

    }
    public function get_slide()
    {
        $data['items']=DB::table('pz-slide')->orderBy('sl_id','desc')->paginate(4);
        $data['ite']=Slide::orderBy('sl_id','DESC')->paginate(4);
    	return view('backend.slide',$data);
    }
    public function save_slide(Request $request)
    {
    	$data=array();
    	$data['sl_name']=$request->name;
        $data['sl_title']=$request->title;
        $data['sl_status']=$request->status;
        $get_image = $request->file('img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/image',$new_image);
            $data['sl_img'] = $new_image;
            DB::table('pz-slide')->insert($data);
            Session::put('message','Thêm Slide Thành công');
            return Redirect::to('admin/slide/add-slide');
        }
        $data['sl_img']=" ";
    	DB::table('pz-slide')->insert($data);
    	Session::put('message','Thêm Slide Thành công');
    	return Redirect::to('admin/slide/add-slide');
    }

    public function active($sl_id)
    {
        DB::table('pz-slide')->where('sl_id',$sl_id)->update(['sl_status'=>1]);
        Session::put('message','Không Hiển Thị Slide Thành Công');
        return Redirect::to('admin/slide');
    }
    public function actived($sl_id)
    {
        DB::table('pz-slide')->where('sl_id',$sl_id)->update(['sl_status'=>0]);
        Session::put('message','Hiển Thị Slide Thành Công');
        return Redirect::to('admin/slide');
    }
    public function edit_slide($sl_id)
    {
        $all=DB::table('pz-slide')->where('sl_id',$sl_id)->get();
        $data=view('backend.edit-slide')->with('all',$all);
        return view('backend-view')->with('backend.edit-slide',$data);
    }
    public function update_slide($sl_id,Request $request)
    {
        $data=array();
    	$data['sl_name']=$request->name;
    	$data['sl_img']=$request->img;
        $data['sl_title']=$request->title;
        $data['sl_status']=$request->status;
        $get_image = $request->file('img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/image',$new_image);
            $data['sl_img'] = $new_image;
            DB::table('pz-slide')->where('sl_id',$sl_id)->update($data);
            Session::put('message','Sửa Thông Tin Slide Thành Công ');
            return Redirect::to('admin/slide');
        }
        $data['sl_img']=" ";
        DB::table('pz-slide')->where('sl_id',$sl_id)->update($data);
        Session::put('message','Sửa Thông Tin Slide Thành Công ');
        return Redirect::to('admin/slide');
    }
    public function delete($sl_id)
    {
        DB::table('pz-slide')->where('sl_id',$sl_id)->delete();
        Session::put('message','Xóa Slide Thành Công');
        return Redirect::to('admin/slide');   
    }
}
