<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
    public function getCate(){
    	$data['catelist']=Category::all();
        $cate=DB::table('pz-category')->orderby('cate_id','desc')->get();
    	return view('backend.category',$data)->with('cate',$cate);
    }
    public function postCate(Request $request){
		$name=$request->name;
		$result=DB::table('pz-category')->where('cate_name',$name)->first();
		if($result){
			return back()->with('message',' Danh Mục Sản Phẩm Bị Trùng');
		}else{
			$category= new Category;
			$category->cate_name=$request->name;
			// $category->cate_parent=$request->name;
			$category->save();
			return back()->with('message','Thêm Danh Mục Sản Phẩm Thành Công');
		}
    }
    public function getEditCate($id){
    	$data['cate']=Category::find($id);
    	return view('backend.edit-category',$data);
    }
    public function postEditCate(EditCategoryRequest $request,$id){
    	$category=  Category::find($id);
    	$category->cate_name=$request->name;
    	$category->save();
    	return redirect()->intended('admin/category'); 
    }
    public function getDeleteCate($id){
    	Category::destroy($id);
    	return back();
    }
	public function save_category($cate_id,Request $request){
		$data=array();
        $data['cate_name']=$request->name;
        DB::table('pz-category')->where('cate_id',$cate_id)->update($data);
        Session::put('message',' Sửa Danh Mục Thành Công Thành Công');
        return Redirect::to('admin/category');
	}
}
