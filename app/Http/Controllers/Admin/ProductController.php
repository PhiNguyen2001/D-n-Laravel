<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\Admin\Product\ProductRequest;
use App\Http\Requests\Admin\Product\UpdateRequest;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $ListProd = Product::paginate(9);
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $ListProd = Product::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $ListProd = Product::Paginate(9);
        }
        $ListProd->load(['category']);
        return view('admin/products/index', ['data' => $ListProd,] );
    }

    public function show()
    {
    }

    public function create()
    {
        $listCate = Category::all();
        return view('admin.products.create', ['listCate' => $listCate]);
    }

    public function store(ProductRequest $request)
    {
        $data =  $request->except('_token');


        $model = new Product();
        $model->fill($request->all());
        // lưu ảnh
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $model->image = $filename;
        }
        $model->save();
        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        $listCate = Category::all();
        return view('admin.products.edit', ['product' => $product, 'listCate' => $listCate]);
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $products = new Product;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('/uploads'), $filename);
            $products->image = $filename;
        }
            $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'image' => $filename,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product)
    {

        $product->delete($product);
        return redirect()->route('admin.products.index');
    }
}