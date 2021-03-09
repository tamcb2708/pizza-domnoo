<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Support\Facades\Redirect;
use PDO;

class ProductController extends Controller
{
    public function get_product(){
        $data['item']=DB::table('pz-product')->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_id','DESC')->paginate(4);
        $data['ite']=Product::orderBy('pr_id','DESC')->paginate(4);
        // $item=DB::table('pz-product')->join('pz-category','pz-product.pr_cate','=','pz-category.cate_id')->orderBy('pr_id','DESC')->paginate(8);
    	return view('backend.product',$data);

    }
    public function add_product(){
        $data['catelist']=Category::all();
    	return view('backend.add-product',$data);
    }
    public function save_product(Request $request){
        $data=array();
    	$data['pr_name']=$request->name;
        $data['pr_sold']=$request->sold;
        $data['pr_view']=$request->view;
        $data['pr_element']=$request->element;
        $data['pr_price']=$request->price;
        $data['pr_pricenew']=$request->pricenew;
        $data['pr_price1']=$request->price1;
        $data['pr_price2']=$request->price2;
        $data['pr_price3']=$request->price3;
        $data['pr_img']=$request->img;
        $data['pr_status']=$request->status;
        $data['pr_desc1']=$request->desc1;
        $data['pr_desc2']=$request->desc2;
        $data['pr_desc3']=$request->desc3;
        $data['pr_more']=$request->more;
        $data['pr_pizza']=$request->cate;
        $data['pr_cate']=$request->cate;
    	DB::table('pz-product')->insert($data);
    	Session::put('message','Thêm Sản Phẩm Thành Công');
    	return Redirect::to('admin/product/add-product');

    }
    public function edit_product($pr_id) 
    {
        $all=DB::table('pz-product')->where('pr_id',$pr_id)->get();
        $data=view('backend.edit-product')->with('all',$all);
        $data['listcate']=Category::all();
        return view('backend-view')->with('backend.edit-product',$data);
    }
    public function update_product($pr_id,Request $request){
        $data=array();
        $data['pr_name']=$request->name;
        $data['pr_sold']=$request->sold;
        $data['pr_view']=$request->view;
        $data['pr_element']=$request->element;
        $data['pr_price']=$request->price;
        $data['pr_pricenew']=$request->pricenew;
        $data['pr_price1']=$request->price1;
        $data['pr_price2']=$request->price2;
        $data['pr_price3']=$request->price3;
        $data['pr_img']=$request->img;
        $data['pr_status']=$request->status;
        $data['pr_desc1']=$request->desc1;
        $data['pr_desc2']=$request->desc2;
        $data['pr_desc3']=$request->desc3;
        $data['pr_more']=$request->more;
        $data['pr_pizza']=$request->cate;
        $data['pr_cate']=$request->cate; 
        DB::table('pz-product')->where('pr_id',$pr_id)->update($data);
        Session::put('message',' Sửa Thông Tin Sản Phẩm Thành Công');
        return Redirect::to('admin/product');
        // $data['listcate']=Category::all();
    	// return view('backend.edit-product',$data);

    }
      public function active($pr_id)
    {
        DB::table('pz-product')->where('pr_id',$pr_id)->update(['pr_status'=>1]);
        return Redirect::to('admin/product');
    }
    public function actived($pr_id)
    {
        DB::table('pz-product')->where('pr_id',$pr_id)->update(['pr_status'=>0]);
        return Redirect::to('admin/product');
    }
    public function delete($pr_id)
    {
        DB::table('pz-product')->where('pr_id',$pr_id)->delete();
        Session::put('message','Xóa Sản Phẩm Thành Công');
        return Redirect::to('admin/product');   
    }
    public function save_picture($pr_id,Request $request){
        $data=array();
        $data['im_img1']=$request->img1;
        $data['im_img2']=$request->img2;
        $data['im_img3']=$request->img3;
        $data['im_img4']=$request->img4;
        $data['im_img5']=$request->img5;
        DB::table('pz-image')->where('im_prod',$pr_id)->update($data);
        Session::put('message',' Sửa Thông Tin Sản Phẩm Thành Công');
        return view('backend.product');
    }
    public function select_picture($pr_id){
        $all=DB::table('pz-product')->where('pr_id',$pr_id)->get();
        $image=DB::table('pz-image')->where('im_prod',$pr_id)->get();
        return view('backend.picture')->with('all',$all)->with('image',$image);
    }
}
