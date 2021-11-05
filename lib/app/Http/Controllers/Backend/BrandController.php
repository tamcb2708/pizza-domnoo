<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Bran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class BrandController extends Controller
{
    public function add_brand()
    {
    	return view('backend.add-brand');

    }
    public function get_brand()
    {
        $data['items']=DB::table('pz-brand')->orderBy('bra_id','desc')->paginate(4);
        $data['ite']=Bran::orderBy('bra_id','DESC')->paginate(4);
    	return view('backend.brand',$data);
    }
    public function save_brand(Request $request)
    {
    	$data=array();
    	$data['bra_name']=$request->name;
        $data['bra_link']=$request->bra_link;
        $data['bra_start']=$request->bra_start;
        $data['bra_end']=$request->bra_end;
        $data['bra_desc']=$request->desc;
    	$data['bra_status']=$request->status;
        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/image',$new_image);
            $data['bra_image'] = $new_image;
            DB::table('pz-brand')->insert($data);
            Session::put('message','Thêm Công Ty Thành công');
            return Redirect::to('admin/brand/add-brand');
        }
        $data['bra_image'] =' ';

    	DB::table('pz-brand')->insert($data);
    	Session::put('message','Thêm Công Ty Thành công');
    	return Redirect::to('admin/brand/add-brand');
    }

    public function active($bra_id)
    {
        DB::table('pz-brand')->where('bra_id',$bra_id)->update(['bra_status'=>1]);
        Session::put('message','Không Hiển Thị Logo Thành Công');
        return Redirect::to('admin/brand');
    }
    public function actived($bra_id)
    {
        DB::table('pz-brand')->where('bra_id',$bra_id)->update(['bra_status'=>0]);
        Session::put('message','Hiển Thị Logo Thành Công');
        return Redirect::to('admin/brand');
    }
    public function edit_brand($bra_id)
    {
        $all=DB::table('pz-brand')->where('bra_id',$bra_id)->get();
        $data=view('backend.edit-brand')->with('all',$all);
        return view('backend-view')->with('backend.edit-brand',$data);
    }
    public function update_brand($bra_id,Request $request)
    {
        $data=array();
    	$data['bra_name']=$request->name;
        $data['bra_link']=$request->bra_link;
        $data['bra_start']=$request->bra_start;
        $data['bra_end']=$request->bra_end;
        $data['bra_desc']=$request->desc;
    	$data['bra_status']=$request->status;
        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/image',$new_image);
            $data['bra_image'] = $new_image;
            DB::table('pz-brand')->where('bra_id',$bra_id)->update($data);
            Session::put('message','Sửa Thông Tin Thành Công ');
            return Redirect::to('admin/brand');
        }
        $data['bra_image'] =' ';
        DB::table('pz-brand')->where('bra_id',$bra_id)->update($data);
        Session::put('message','Sửa Thông Tin Thành Công ');
        return Redirect::to('admin/brand');
    }
    public function delete($bra_id)
    {
        DB::table('pz-brand')->where('bra_id',$bra_id)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('admin/brand');   
    }
}
