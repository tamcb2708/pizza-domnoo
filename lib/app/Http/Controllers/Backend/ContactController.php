<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Model\Contact;
use Illuminate\Support\Facades\Redirect;
class ContactController extends Controller
{
    public function get_contact()
    {
        $data['items']=DB::table('pz-contact')->orderBy('ct_id','desc')->paginate(8);
        $data['ite']=Contact::orderBy('ct_id','DESC')->paginate(8);
    	return view('backend.contact',$data);
    }
    public function delete($ct_id)
    {
        DB::table('pz-contact')->where('ct_id',$ct_id)->delete();
        Session::put('message','Xóa Liên Hệ Thành Công');
        return Redirect::to('admin/contact');   
    }
    public function edit_contact($ct_id)
    {
        $all=DB::table('pz-contact')->where('ct_id',$ct_id)->get();
        $data=view('backend.edit-contact')->with('all',$all);
        return view('backend-view')->with('backend.edit-contact',$data);
    }
}
