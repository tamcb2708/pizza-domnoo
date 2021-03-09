<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Agent;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class AgentController extends Controller
{
    public function add_agent()
    {
    	return view('backend.add-agent');

    }
    public function get_agent()
    {
        $data['items']=DB::table('pz-agent')->orderBy('ag_id','desc')->paginate(4);
        $data['ite']=Agent::orderBy('ag_id','DESC')->paginate(4);
    	return view('backend.agent',$data);
    }
    public function save_agent(Request $request)
    {
    	$data=array();
    	$data['ag_name']=$request->name;
    	$data['ag_address']=$request->address;
    	$data['ag_old']=$request->old;
        $data['ag_img']=$request->img;
        $data['ag_phone']=$request->phone;
    	$data['ag_status']=$request->status;
        $data['ag_facebook']=$request->facebook;
        $data['ag_instar']=$request->instar;
        $data['ag_twitters']=$request->twitters;
        $data['ag_google']=$request->google;

    	DB::table('pz-agent')->insert($data);
    	Session::put('message','Thêm Nhân Viên Thành công');
    	return Redirect::to('admin/agent/add-agent');
    }

    public function active($ag_id)
    {
        DB::table('pz-agent')->where('ag_id',$ag_id)->update(['ag_status'=>1]);
        Session::put('message','Không Hiển Thị Nhân Viên Thành Công');
        return Redirect::to('admin/agent');
    }
    public function actived($ag_id)
    {
        DB::table('pz-agent')->where('ag_id',$ag_id)->update(['ag_status'=>0]);
        Session::put('message','Hiển Thị Nhân Viên Thành Công');
        return Redirect::to('admin/agent');
    }
    public function edit_agent($ag_id)
    {
        $all=DB::table('pz-agent')->where('ag_id',$ag_id)->get();
        $data=view('backend.edit-agent')->with('all',$all);
        return view('backend-view')->with('backend.edit-agent',$data);
    }
    public function update_agent($ag_id,Request $request)
    {
        $data=array();
        $data['ag_name']=$request->name;
        $data['ag_address']=$request->address;
        $data['ag_old']=$request->old;
        $data['ag_phone']=$request->phone;
        $data['ag_facebook']=$request->facebook;
        $data['ag_twitters']=$request->twitters;
        $data['ag_google']=$request->google;
        $data['ag_img']=$request->img;
        $data['ag_instar']=$request->instar;
        DB::table('pz-agent')->where('ag_id',$ag_id)->update($data);
        Session::put('message','Sửa Thông Tin Nhân Viên Thành Công ');
        return Redirect::to('admin/agent');
    }
    public function delete($ag_id)
    {
        DB::table('pz-agent')->where('ag_id',$ag_id)->delete();
        Session::put('message','Xóa Nhân Viên Thành Công');
        return Redirect::to('admin/agent');   
    }
}
