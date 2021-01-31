<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Category;
use App\Products;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $banners = Banners::where('status','1')->orderby('sort_order','asc')->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Products::paginate(6);
        $product_search = $request->input('search');
        $searchProducts = Products::where('name','like','%'.$product_search.'%')->where('status',1)->paginate(4);
        $latestProducts = Products::where(['latest_product'=>1])->get();
        $featuredProducts = Products::where(['featured_products'=>1])->get();
        return view('wayshop.index')->with(compact('product_search','searchProducts','banners','categories','products','latestProducts','featuredProducts'));
    }

    

    public function categories($category_id){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Products::where(['category_id'=>$category_id])->paginate(6);
        $product_name = Products::where(['category_id'=>$category_id])->first();
        return view('wayshop.category')->with(compact('categories','products','product_name'));
    }

    public function home()
    {
        $banners = Banners::where('status','1')->orderby('sort_order','asc')->get();
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Products::paginate(6);
        $featuredProducts = Products::where(['featured_products'=>1])->get();

        return view('wayshop.index')->with(compact('banners','categories','products','featuredProducts'));
    }

    public function Pdetails()
    {
     

        return view('wayshop.product_detailss');
    }

    
}
