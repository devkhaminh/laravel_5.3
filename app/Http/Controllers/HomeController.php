<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Cate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product1 = Product::select('id','name','image','price','intro','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
        // $product2 = Product::select('id','name','image','price','intro','alias')->orderBy('id','DESC')->skip(4)->take(4)->get();
        
        // $product3 = Product::select('id','name','image','price','intro','alias')->orderBy('price','ASC')->skip(0)->take(4)->get();
        // $product4 = Product::select('id','name','image','price','intro','alias')->orderBy('price','ASC')->skip(4)->take(4)->get();

        // return view('theme.pages.home',compact('product1','product2','product3','product4'));
        return view('home');
    }
    public function trangchu(){
        $product1 = Product::select('id','name','image','price','intro','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
        $product2 = Product::select('id','name','image','price','intro','alias')->orderBy('id','DESC')->skip(4)->take(4)->get();
        
        $product3 = Product::select('id','name','image','price','intro','alias')->orderBy('price','ASC')->skip(0)->take(4)->get();
        $product4 = Product::select('id','name','image','price','intro','alias')->orderBy('price','ASC')->skip(4)->take(4)->get();

        return view('theme.pages.home',compact('product1','product2','product3','product4'));
        // return view('theme.pages.home');
    }
    public function trangquantri(){
        return view('admin.user.list');
    }
    public function sanphamnu(){
        $product_nu = Product::select('id','name','alias','image','price','intro','keywords')->where('keywords','like','%'.'nữ'.'%')->orderBy('id','DESC')->get()->toArray();
        return view('theme.pages.product_nu',compact('product_nu'));
    }

    public function sanphamnam(){
        $product_nam = Product::select('id','name','alias','image','price','intro','keywords')->where('keywords','like','%'.'nam'.'%')->orderBy('id','DESC')->get()->toArray();
        return view('theme.pages.product_nam',compact('product_nam'));
    }
    public function sanphamcon(Request $req){
        //  chỗ này là lấy alias so sánh với alias ở mục alias bảng product
        // nếu = thì trả về biến tag
        // vì ví dụ như áo A, áo B thuộc áo nữ, thì where cate_id tới áo nữ là ok
        $search = $req->alias;
        if($search == 'ao-nu'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',10)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'quan-nu'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',11)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'dam-nu'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',12)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'vay-nu'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',13)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'giay-nu'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',14)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'son-nu'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',15)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'tui-xach-nu'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',18)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'ao-nam'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',20)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'quan-nam'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',21)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
        elseif($search == 'giay-nam'){
            // echo "OK";
            $tag = Product::select('id','name','alias','image','price','intro','cate_id')->where('cate_id',22)->orderBy('id','DESC')->get()->toArray();
            return view('theme.pages.sanphamcon',compact('tag'));
        }
    }
    public function sanphammoinhat(){
        $tag = Product::select('id','name','alias','image','price','intro','cate_id')->orderBy('id','DESC')->skip(0)->take(8)->get()->toArray();
        return view('theme.pages.sanphammoinhat',compact('tag'));
    }
    public function sanphamrenhat(){
        $tag = Product::select('id','name','alias','image','price','intro','cate_id')->orderBy('price','ASC')->skip(0)->take(8)->get()->toArray();
        return view('theme.pages.sanphamrenhat',compact('tag'));
    }

    // thông tin từng sp
    public function thongtinsanpham($id){
        $detail = Product::select('id','name','price','intro','keywords','image','alias','description')->where('id',$id)->first();

        $image = DB::table('product_images')->select('id','image')->where('product_id',$detail->id)->get();
        return view('theme.pages.thongtinsanpham',compact('detail','image'));
    }
}
