<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Model\Cate;
class BlogController extends Controller
{
    public function add_blog()
    {
        $data['catelist']=Cate::all();
    	return view('backend.add-blog',$data);

    }
    public function get_blog()
    {
        $data['items']=DB::table('pz-blog')->join('pz-cate','pz-blog.bl_cate','=','pz-cate.ca_id')->orderBy('bl_id','DESC')->paginate(4);
        $data['ite']=Blog::orderBy('bl_id','DESC')->paginate(8);
    	return view('backend.blog',$data);
    }
    public function save_blog(Request $request)
    {
    	$data=array();
    	$data['bl_name']=$request->name;
        $data['bl_title']=$request->title;
        $data['bl_img1']=$request->img1;
        $data['bl_img2']=$request->img2;
        $data['bl_img3']=$request->img3;
    	$data['bl_status']=$request->status;
        $data['bl_desc1']=$request->desc1;
        $data['bl_desc2']=$request->desc2;
        $data['bl_desc3']=$request->desc3;
        $data['bl_desc4']=$request->desc4;
        $data['bl_desc5']=$request->desc5;
        $data['bl_author']=$request->author;
        $data['bl_comment']=$request->comment;
        $data['bl_cate']=$request->cate;
    	DB::table('pz-blog')->insert($data);
    	Session::put('message','Thêm Bài Viết Thành công');
    	return Redirect::to('admin/blog/add-blog');
    }

    public function active($bl_id)
    {
        DB::table('pz-blog')->where('bl_id',$bl_id)->update(['bl_status'=>1]);
        Session::put('message','Không Hiển Thị Bài ViếtThành Công');
        return Redirect::to('admin/blog');
    }
    public function actived($bl_id)
    {
        DB::table('pz-blog')->where('bl_id',$bl_id)->update(['bl_status'=>0]);
        Session::put('message','Hiển Thị Bài Viết Thành Công'); 
        return Redirect::to('admin/blog');
    }
    public function edit_blog($bl_id)
    {
        $all=DB::table('pz-blog')->where('bl_id',$bl_id)->get();
        $data=view('backend.edit-blog')->with('all',$all);
        $data['listcate']=Cate::all();
        return view('backend-view')->with('backend.edit-blog',$data);
    }
    public function update_blog($bl_id,Request $request)
    {
        $data=array();
    	$data['bl_name']=$request->name;
        $data['bl_title']=$request->title;
        $data['bl_img1']=$request->img1;
        $data['bl_img2']=$request->img2;
        $data['bl_img3']=$request->img3;
    	$data['bl_status']=$request->status;
        $data['bl_desc1']=$request->desc1;
        $data['bl_desc2']=$request->desc2;
        $data['bl_desc3']=$request->desc3;
        $data['bl_desc4']=$request->desc4;
        $data['bl_desc5']=$request->desc5;
        $data['bl_author']=$request->author;
        $data['bl_comment']=$request->comment;
        $data['bl_cate']=$request->cate;
        DB::table('pz-blog')->where('bl_id',$bl_id)->update($data);
        Session::put('message','Sửa Thông Tin Thành Công ');
        return Redirect::to('admin/blog');
    }
    public function delete($bl_id)
    {
        DB::table('pz-blog')->where('bl_id',$bl_id)->delete(); 
        Session::put('message','Xóa Thành Công');
        return Redirect::to('admin/blog');   
    }
}
