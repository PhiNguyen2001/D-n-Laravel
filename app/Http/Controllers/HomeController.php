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
        $product = Product::where('category_id', 2)->get();
        $relproduct = Product::where('category_id', 1)->get();

        return view('frontend.index', compact('product', 'category', 'relproduct'));
    }
    public function shop(Request $request)
    {
        $category = Category::all();
        $product = Product::paginate(6);
        return view('frontend.shop', compact('product', 'category'));
    }
    public function product(Request $request, $id)
    {
        $category = Category::all();
        $product = Product::where('category_id', $id)->get();

        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'giam_dan') {
                $product = Product::where('category_id', $id)->orderBy('price', 'DESC')->paginate(6);
            } elseif ($sort_by == 'tang_dan') {
                $product = Product::where('category_id', $id)->orderBy('price', 'ASC')->paginate(6);
            } elseif ($sort_by == 'kytu_az') {
                $product = Product::where('category_id', $id)->orderBy('name', 'ASC')->paginate(6);
            } elseif ($sort_by == 'kytu_za') {
                $product = Product::where('category_id', $id)->orderBy('name', 'DESC')->paginate(6);
            }
        } else {
            $product = Product::where('category_id', $id)->orderBy('name', 'ASC')->paginate(6);
        }
        return view('frontend.product', compact('product', 'category'));
    }
    public function detail_product($id)
    {
        $product = Product::find($id);
        $category = Category::all();
        $relatedProduct = Product::orderBy('category_id','DESC')->take(4)->get();
        return view('frontend.detail-product', compact('product', 'relatedProduct', 'category'));
    }
    public function search(Request $request)
    {
        $category = Category::all();
        
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $product = Product::where('name', 'LIKE', "%$keyword%")->get();
        } else {
             $product = Product::paginate(6);
        }

        return view('frontend.shop', compact('category', 'product'), [
            'data' => $product
        ]);
    }

    public function filter(Request $request)
    {
        $category = Category::all();
        if ($request->has('price') == true) {
            switch ($request->get('price')) {
                case 1:
                    $product = Product::where('price', '<', '100000')->get();
                    break;
                case 2:
                    $product = Product::whereBetween('price', [100000, 200000])->get();
                    break;
                case 3:
                    $product = Product::whereBetween('price', [200000, 400000])->get();
                    break;
            }
        }
        return view('frontend.product', compact('category', 'product'), [
            'data' => $product
        ]);
    }
}
