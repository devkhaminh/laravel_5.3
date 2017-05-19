<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Nhung
use App\Http\Requests\CateRequest;
use App\Cate;
use App\Minh;
class CateController extends Controller
{
	public function getList(){
		$data = Cate::select('id','name','parent_id')->orderBy('id','ASC')->get()->toArray();
		return view('admin.cate.list',compact('data'));
	}
	public function getAdd(){
		$parent = Cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.add',compact('parent'));
	}
	public function postAdd(CateRequest $req){
		$cate = new Cate;
		$cate->name=$req->txtCateName;
		$cate->alias=changeTitle($req->txtCateName);
		$cate->order=$req->txtOrder;
		$cate->parent_id=$req->sltParent;
		$cate->keywords=$req->txtKeywords;
		$cate->description=$req->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Completex']);
	}
	public function getDelete($id){
		// echo $id; để test
		$parent = Cate::where('parent_id',$id)->count();// đếm số parent_id = id, tức là con của A con X thì ko dc xóa X
		if($parent==0){
			$cate = Cate::find($id);
			$cate->delete($id);
			return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công']);
		}else{
			echo "<script type='text/javascript'>
			alert('Không thể xóa mục này, vì nó có phần tử con');
			window.location='";
			echo route('admin.cate.list');
			echo "'
		</script>";
		}
	}
	public function getEdit($id){
		$data = Cate::findOrFail($id)->toArray();
		$parent = Cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.edit',compact('parent','data','id'));
	}
	public function postEdit(Request $req,$id){
		$this->validate($req,
			["txtCateName"=>"required"],
			["txtCateName.required"=>'Không được để trống Category chỉnh sửa']
		);
		$cate = Cate::find($id); // tìm id chỉnh sửa và update vào
		$cate->name=$req->txtCateName;
		$cate->alias=changeTitle($req->txtCateName);
		$cate->order=$req->txtOrder;
		$cate->parent_id=$req->sltParent;
		$cate->keywords=$req->txtKeywords;
		$cate->description=$req->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa thành công']);
	}
}
