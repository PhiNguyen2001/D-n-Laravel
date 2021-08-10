<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $product = Product::where('category_id',2)->get();
        $relproduct = Product::where('category_id',1)->get();
        return view('frontend.index', compact('product','category','relproduct'));
    }
    public function shop()
    {   
        $category = Category::all();
        $product = Product::paginate(9);
        return view('frontend.shop', compact('product', 'category'));
    }
    public function product($id)
    {   
        $category = Category::all();
        $product = Product::where('category_id',$id)->get();
       
        return view('frontend.product', compact('product','category'));
    }
    public function detail_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $relatedProduct = Product::orderBy('category_id', 'asc')->take(4)->get();
        return view('frontend.detail-product', compact('product','relatedProduct','category'));
    }
    
}

