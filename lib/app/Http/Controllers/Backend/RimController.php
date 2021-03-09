<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Rim;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class RimController extends Controller
{
    public function add_rim()
    {
    	return view('backend.add-rim');

    }
    public function get_rim()
    {
        $data['items']=DB::table('pz-rim')->orderBy('ri_id','desc')->paginate(4);
        $data['ite']=rim::orderBy('ri_id','DESC')->paginate(4);
    	return view('backend.rim',$data);
    }
    public function save_rim(Request $request)
    {
    	$data=array();
    	$data['ri_name']=$request->name;
        $data['ri_price']=$request->price;

    	DB::table('pz-rim')->insert($data);
    	Session::put('message','Thêm Tùy Chọn Thành công');
    	return Redirect::to('admin/rim/add-rim');
    }
    public function edit_rim($ri_id)
    {
        $all=DB::table('pz-rim')->where('ri_id',$ri_id)->get();
        $data=view('backend.edit-rim')->with('all',$all);
        return view('backend-view')->with('backend.edit-rim',$data);
    }
    public function update_rim($ri_id,Request $request)
    {
        $data=array();
        $data['ri_name']=$request->name;
        $data['ri_price']=$request->price;
        DB::table('pz-rim')->where('ri_id',$ri_id)->update($data);
        Session::put('message','Sửa Thông Tin Thành Công ');
        return Redirect::to('admin/rim');
    }
    public function delete($ri_id)
    {
        DB::table('pz-rim')->where('ri_id',$ri_id)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('admin/rim');   
    }
}
