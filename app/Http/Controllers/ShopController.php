<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banners;
use App\Category;
use App\Products;
use App\User;

class ShopController extends Controller
{

    public function indexShop(Request $request)
    {
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Products::paginate(6);
        $product_search = $request->input('search');
        $searchProducts = Products::where('name','like','%'.$product_search.'%')->where('status',1)->paginate(4);
        $featuredProducts = Products::where(['featured_products'=>1])->get();
        return view('wayshop.shop')->with(compact('product_search','searchProducts','categories','products','featuredProducts'));
    }
}
