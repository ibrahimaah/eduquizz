<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    { 
        $users = User::all();
        return view('admin.users.index',['users' => $users]);
    }

    public function create()
    {  
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $validatedData['password'];
        $user->role = 'admin';

        $user->save();

        return redirect()->route('admin.users.create')->with('success', 'تمت إضافة المستخدم بنجاح!');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::find($id);
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        if(!empty($validatedData['password']))
        {
            $user->password = $validatedData['password'];
        }
        $user->save();

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'تم تعديل بيانات المستخدم بنجاح!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'تم حذف المستخدم بنجاح!');
    }

}
