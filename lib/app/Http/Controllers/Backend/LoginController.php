<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use  App\Model\User;
use App\Model\Roles;
use Illuminate\Support\Facades\Auth;
session_start();
class LoginController extends Controller
{
    public function getlogin(){
        return view('backend.login-auth');
    }
    public function delete($ad_id){
        if(Auth::id()==$ad_id){
            return redirect()->back()->with('message','Không Được Xóa chính Mình');
        }
        $admin=User::find($ad_id);
        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message','Xóa Tài Khoản Thành Công');
    }
    public function index(){
        $data['ite']=User::with('roles')->orderBy('ad_id','DESC')->paginate(4);
        // $user=User::with('roles')->orderBy('ad_id','DESC')->paginate(15);
        return view('backend.user',$data);
    }
    public function assign_role(Request $request){
        if(Auth::id()==$request->admin_id){
            return redirect()->back()->with('message','Bạn Không Được Phân Quyền Chính Mình');
        }
        $data=$request->all();
        $user=User::where('ad_email',$data['admin_email'])->first();
        $user->roles()->detach();
        if($request['author_role']){
            $user->roles()->attach(Roles::where('rol_name','author')->first());
        }if($request['admin_role']){
            $user->roles()->attach(Roles::where('rol_name','admin')->first());
        }if($request['user_role']){
            $user->roles()->attach(Roles::where('rol_name','user')->first());
        }
        return redirect()->back()->with('message','Phân Quyền Thành Công');
    }
    // public function gethome(){
        // $admin=Auth::id();
        // if($admin){
        //     return Redirect::to('admin/home');
        // }else{
        //     return Redirect::to('admin')->send();
        // }
        // return view('backend.index');
    // }
    public function postlogin(Request $request){
        $email=$request->email;
        $password=md5($request->password);

        $result=DB::table('pz-user')->where('ad_email',$email)->where('ad_password',$password)->first();
        if($result){
            Session::put('ad_name',$result->ad_name);
            Session::put('ad_id',$result->ad_id);
            return Redirect::to('/admin/home');
        }else{
            Session::put('message','Tài Khoản Hoặc Mật Khẩu Không Đúng');
            return Redirect::to('/admin');
        }
    }
    public function login_auth(){
        return view('backend.login-auth');
    }
    public function login(Request $request){
        // $data=$request->all();
        if(Auth::attempt(['ad_email' => $request->email, 'ad_password' => $request->password])){
            return redirect('admin/home');
        }else{
            $this->validate($request,[
                'email'=>'required|max:255',
                'password'=>'required|max:255',
            ]);
            return redirect('admin/login-auth')->with('message','Tài Khoản Hoặc Mật Khẩu Không Đúng');
        }
    }
    public function logout_auth(){
        Auth::logout();
        return redirect('admin/login-auth')->with('message','Đăng Xuất Thành Công');
    }
    public function logout(){
        Session::put('ad_name',null);
        Session::put('ad_id',null);
        return Redirect::to('/admin');
    }
    public function register_auth(){
        return view('backend.register');
    }
    public function register(Request $request){
        $this->validation($request);
        $data=$request->all();
        $admin=new User();
        $admin->ad_email=$data['email'];
        $admin->ad_name=$data['name'];
        $admin->ad_phone=$data['phone'];
        $admin->ad_password=md5($data['password']);
        $admin->save();
        return redirect('admin/user')->with('message','Đăng Ký Thành Công');
    }
    public function validation($request){
        return $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:255',
            'password'=>'required|max:255',
        ]);
    }
    public function impersonate($ad_id){
        $user=User::where('ad_id',$ad_id)->first();
        if($user){
            session()->put('impersonate',$user->ad_id);
        }
        return redirect('/admin/home');
    }
    public function impersonate_detroy(){
        session()->forget('impersonate');
        return redirect('/admin/user');
    }
    public function edit_admin($ad_id){
        $data['item'] = User::find($ad_id);
        return view('backend.edit-admin',$data);
    }
    public function save_setting(Request $request, $ad_id){
        $data=array();
        if($request->ad_password != $request->ad_check_password){
            Session::put('error','Nhập lại mật khẩu chưa đúng mời bạn nhập lại !');
            return Redirect::to('admin/edit-admin/'.$ad_id);
        }
        $data['ad_password']=md5($request->ad_password);
        $data['ad_name']=$request->ad_name;
        $data['ad_email']=$request->ad_email;
        $data['ad_phone']=$request->ad_phone;
        $data['ad_address']=$request->ad_address;
        $data['ad_old']=$request->ad_old;
        $get_image = $request->file('img');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/image',$new_image);
            $data['ad_img'] = $new_image;
            DB::table('pz-user')->where('ad_id',$ad_id)->update($data);
            Session::put('message',' Sửa Thông Tin Thành Công');
            return Redirect::to('admin/edit-admin/'.$ad_id);

        }
        $data['ad_img']='';
        DB::table('pz-user')->where('ad_id',$ad_id)->update($data);
        Session::put('message',' Sửa Thông Tin Thành Công');
        return Redirect::to('admin/edit-admin/'.$ad_id);
    }
}