<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\Product;
use App\Http\Requests\Admin\User\UpdateRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {

        // $ListUser = null;
        if ($request->has('keyword') == true) {
            $keyword = $request->get('keyword');
            // SELECT * FROM users WHERE email LIKE '%keyword%'
            $ListUser = User::where('name', 'LIKE', "%$keyword%")->get();
        } else {
            $ListUser = User::all();
        }

        $ListUser->load([
            'invoices',
        ]);

        return view('admin/users/index', [
            'data' => $ListUser,
        ]);
        
    }

    public function show(User $user)
    {

        return view('admin/users/show', ['user' => $user,]);
    }

    public function create()
    {
       return view('admin/users/create');
    }

    public function store(StoreRequest $request)
    {
        $data =  $request->except('_token');

        $result = User::create($data);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user,]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->except('_token');
        $user->update($data);
        return redirect()->route('admin.users.index');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
