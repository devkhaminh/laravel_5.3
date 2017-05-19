<?php namespace App\Http\Controllers;
use DB,Mail,Request,Cart;
use Illuminate\Http\Requests;
use App\Product;
use App\Cate;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function index()
    {
        $product1 = Product::select('id','name','image','price','intro','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
        $product2 = Product::select('id','name','image','price','intro','alias')->orderBy('id','DESC')->skip(4)->take(4)->get();
        
        $product3 = Product::select('id','name','image','price','intro','alias')->orderBy('price','ASC')->skip(0)->take(4)->get();
        $product4 = Product::select('id','name','image','price','intro','alias')->orderBy('price','ASC')->skip(4)->take(4)->get();

        return view('theme.pages.home',compact('product1','product2','product3','product4'));
    }

}
