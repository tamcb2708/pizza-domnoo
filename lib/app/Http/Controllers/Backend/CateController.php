<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Cate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\EditCateRequest;
use App\Http\Requests\AddCateRequest;
use PDO;
class CateController extends Controller
{
    public function getCate(){
        $data['cate']=DB::table('pz-cate')->orderby('ca_id','desc')->paginate(3);
		$data['ite']=Cate::orderBy('ca_id','DESC')->paginate(3);
    	return view('backend.cate',$data);
    }
    public function postCate(Request $request){
		$name=$request->names;
		$result=DB::table('pz-cate')->where('ca_name',$name)->first();
		if($result){
			return back()->with('message',' Danh Mục Bài Viết Bị Trùng');
		}else{
			$category= new Cate;
			$category->ca_name=$request->names;
			$category->ca_description = $request->description;
			// $category->cate_parent=$request->name;
			$category->save();
			return back()->with('message','Thêm Danh Mục Bài Viết Thành Công');
		}
    }
    public function getEditCate($id){
    	$data['cate']=Cate::find($id);
    	return view('backend.edit-cate',$data);
    }
    public function postEditCate(EditCateRequest $request,$id){
    	$category=  Cate::find($id);
    	$category->ca_name=$request->names;
		$category->ca_description=$request->description;
    	$category->save();
    	return redirect()->intended('admin/cate'); 
    }
    public function getDeleteCate($id){
    	Cate::destroy($id);
    	return back();
    }
	public function save_cate($ca_id,Request $request){
		$data=array();
        $data['ca_name']=$request->names;
		$data['ca_description']=$request->description;
        DB::table('pz-cate')->where('ca_id',$ca_id)->update($data);
        Session::put('message',' Sửa Danh Mục Thành Công Thành Công');
        return Redirect::to('admin/cate');
	}
}
 