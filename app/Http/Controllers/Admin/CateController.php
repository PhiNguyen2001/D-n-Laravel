<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\Category\CateRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;

class CateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $ListCate = Category::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $ListCate = Category::all();
        }
        $ListCate->load(['products']);
        return view('admin/categories/index', ['data' => $ListCate,]);
    }

    public function show()
    {
    }

    public function create()
    {
        return view('admin/categories/create');
    }

    public function store(CateRequest $request)
    {
        $data =  $request->except('_token');
        

        $result = Category::create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $cate)
    {
        return view('admin/categories/edit', ['cate' => $cate,]);
    }

    public function update(UpdateRequest $request ,Category $cate)
    {
        $data = $request->except('_token');

        $cate->update($data);


        return redirect()->route('admin.categories.index');
    }

    public function delete(Category $cate)
    {
        $cate->delete($cate);
        return redirect()->route('admin.categories.index');
    }
}
