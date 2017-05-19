<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//nhúng
use App\User;
use App\Http\Requests\UserRequest;
use Hash;
use Auth;
class UserController extends Controller
{
	public function getList(){
		$user = User::select('id','username','level')->orderBy('id','ASC')->get()->toArray();
		return view('admin.user.list',compact('user'));
	}
	public function getAdd(){
		return view('admin.user.add');
	}
	public function postAdd(UserRequest $req){
		$user = new User();
		$user->username 		= $req->txtUser;
		$user->password			= Hash::make($req->txtPass);// lấy username+pass rồi mã hóa
		$user->email 			= $req->txtEmail;
		$user->level 			= $req->rdoLevel;
		$user->remember_token 	= $req->_token;
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Thêm người dùng thành công']);
	}
	public function getDelete($id){
		$user_current_login = Auth::user()->id;
		$user = User::find($id);

		// superadmin
		if(($id==2) || ($user_current_login!=2 && $user['level']==1)){
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Không được phép xóa Super Admin hoặc xóa chính bạn']);
		}else{
			$user->delete($id);
			return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Xóa người dùng thành công']);
		}
	}
	public function getEdit($id){
		$data = User::find($id);
		//admin thường và super admin  hoặc admin và ko phải chính mình
		if((Auth::user()->id!=2)&&($id==2 || ($data['level']==1 && (Auth::user()->id!=$id)))){
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Không được phép sửa']);
		}
		return view('admin.user.edit',compact('data','id'));
	}
	public function postEdit($id,Request $req){
		$user=User::find($id);
		$user->username=$req->txtUser;
		if($req->input('txtPass')){
			$this->validate($req,[
				'txtRePass'=>'same:txtPass'
			],[
				'txtRePass.same'=>'2 Password không giống nhau'
			]
			);
			$pass= $req->input('txtPass');
			$user->password=Hash::make($pass);
		}
		$user->email=$req->txtEmail;
		$user->level=$req->rdoLevel;
		$user->remember_token=$req->input('_token');
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Sửa thông tin người dùng thành công']);
	}
}
