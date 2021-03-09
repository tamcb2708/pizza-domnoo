<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Extra;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class ExtraController extends Controller
{
    public function add_extra()
    {
    	return view('backend.add-extra');

    }
    public function get_extra()
    {
        $data['items']=DB::table('pz-extra')->orderBy('ex_id','desc')->paginate(4);
        $data['ite']=Extra::orderBy('ex_id','DESC')->paginate(4);
    	return view('backend.extra',$data);
    }
    public function save_extra(Request $request)
    {
    	$data=array();
    	$data['ex_name']=$request->name;
        $data['ex_price']=$request->price;

    	DB::table('pz-extra')->insert($data);
    	Session::put('message','Thêm Tùy Chọn Thành công');
    	return Redirect::to('admin/extra/add-extra');
    }
    public function edit_extra($ex_id)
    {
        $all=DB::table('pz-extra')->where('ex_id',$ex_id)->get();
        $data=view('backend.edit-extra')->with('all',$all);
        return view('backend-view')->with('backend.edit-extra',$data);
    }
    public function update_extra($ex_id,Request $request)
    {
        $data=array();
        $data['ex_name']=$request->name;
        $data['ex_price']=$request->price;
        DB::table('pz-extra')->where('ex_id',$ex_id)->update($data);
        Session::put('message','Sửa Thông Tin Thành Công ');
        return Redirect::to('admin/extra');
    }
    public function delete($ex_id)
    {
        DB::table('pz-extra')->where('ex_id',$ex_id)->delete();
        Session::put('message','Xóa Thành Công');
        return Redirect::to('admin/extra');   
    }
}
