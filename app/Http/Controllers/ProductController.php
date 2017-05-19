<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// nhúng
use App\Cate;
use App\Http\Requests\ProductRequest;
use App\Product;
use Input,File;
use App\ProductImages;
use Request;// dùng ajax phải bỏ Illuminate\Http\Request
use Auth;

class ProductController extends Controller
{
	public function getList(){
		$data = Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('data'));
	}
	public function getAdd(){
		$cate = Cate::select('name','id','parent_id')->get()->toArray();
		return view('admin.product.add',compact('cate'));
	}
	public function postAdd(ProductRequest $request){
				$file_name = $request->file('fImages')->getClientOriginalName();
				$product = new Product();
				$product->name      	= $request->txtName;
				$product->alias     	= changeTitle($request->txtName);
				$product->price     	= $request->txtPrice;
				$product->intro     	= $request->txtIntro;
				$product->content   	= $request->txtContent;
				$product->image     	= $file_name;
				$product->keywords  	= $request->txtKeywords;
				$product->description = $request->txtDescription;
				$product->user_id   	= Auth::user()->id ;
				$product->cate_id   	= $request->sltParent;
				$request->file('fImages')->move('resources/upload/',$file_name);
				$product->save();

				$product_id=$product->id;
				if(Input::hasFile('fProductDetail')){
						foreach(Input::file('fProductDetail') as $file){
								$product_img= new ProductImages();
								if(isset($file)){
										$product_img->image=$file->getClientOriginalName();
										$product_img->product_id=$product_id;
										$file->move('resources/upload/detail/',$file->getClientOriginalName());
										$product_img->save();
								}
						}// chỗ này phải vào trong vendor/laravel/framework/src/Illuminate/Http/UploadedFile.php xóa : instanceof static, chỉ còn $file ? $file : new static(
				}
				return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Success ! Thêm Sản phẩm thành công ']);
		}
		public function getDelete($id){
			$product_detail = Product::find($id)->pimages->toArray();// tìm id có liên kết với ảnh
			//public function pimages(){ cái này bên chỗ Product Model 1 sản phẩm có nhiều ảnh
		// return $this->hasMany('App\ProductImages');
		// }
		foreach ($product_detail as $value) {
			File::delete('resources/upload/detail/'.$value["image"]);// mảng
		}
		$product = Product::find($id);
		File::delete('resources/upload/'.$product->image);// đối tượng
		$product->delete($id);

		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Success ! Xóa Sản phẩm thành công ']);
			// quy trình xóa: xóa detail -> xóa hình chính -> xóa data
		}
		public function getEdit($id){
			$cate = Cate::select('id','name','parent_id')->get()->toArray();
			// lấy cate_id
			$product = Product::find($id);
			$product_image = Product::find($id)->pimages;// lấy hình con
			return view('admin.product.edit',compact('cate','product','product_image'));
		}
		public function postEdit($id,Request $req){
			$product = Product::find($id);

			$product->name 				= Request::input('txtName'); // dùng input này cũng dc có thể dùng cách ở postAdd
			$product->alias				=	changeTitle(Request::input('txtName'));
			$product->price 			=	Request::input('txtPrice');
			$product->intro 			=	Request::input('txtIntro');
			$product->content 			=	Request::input('txtContent');
			$product->keywords 			=	Request::input('txtKeywords');
			$product->description 		=	Request::input('txtDescription');
			$product->user_id			=	Auth::user()->id;
			$product->cate_id			=	Request::input('sltParent');


			$img_current = 'resources/upload/'.Request::input('img_current');// đây dùng để kiểm tra tồn tại

				// đoạn kiểm tra file ảnh - cần kiểm tra thêm ở edit.blade
			if(!empty(Request::file('fImages'))){
				// echo 'Có FIle';
				$file_name = Request::file('fImages')->getClientOriginalName();// lấy biến file_name = kiếm file ở name fImages, rồi lấy tên file
				$product->image = $file_name;// lưu vào db
				Request::file('fImages')->move('resources/upload/',$file_name);
				if(File::exists($img_current)){// nếu tồn tại ảnh chính img_current - đường dẫn + tên file
					File::delete($img_current);
				}
			}else{
				echo 'Ko có file';
			}
			// kết thúc kiểm tra file ảnh


			$product->save();// phần này lưu lại, xử lí ở bảng product


			// phần xử lí ảnh con - bảng product_image
			if(!empty(Request::file('fEditDetail'))){//fEditDetail là ô input dc sinh ra = my_js.js khi click add Image
				foreach(Request::file('fEditDetail') as $file){
					$product_img = new ProductImages();
					if(isset($file)){
						$product_img->image= $file->getClientOriginalName();
						$product_img->product_id = $id;// tìm tới id ảnh - id ở bảng product. còn biến bên VT là ở bảng product_image
						$file->move('resources/upload/detail/',$file->getClientOriginalName());
						$product_img->save();
					}
				}
			}


			return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Success ! Sửa Sản phẩm thành công ']);
		}
		public function getDelImg($id){
			if(Request::ajax()){
				$idHinh=(int)Request::get('idHinh');
				$image_detail=ProductImages::find($idHinh);
				if(!empty($image_detail)){
					$img = 'resources/upload/detail/'.$image_detail->image;
					if(File::exists($img)){
						File::delete($img);
					}
					$image_detail->delete();
				}
				return "OK";
			}
		}
}
