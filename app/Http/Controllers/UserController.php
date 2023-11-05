<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $user = User::all();
        return view('blade.user.user', compact('user'));
    }

    public function userStore(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => $request->input('is_admin')
        ]);


        return redirect()->back()->with('success', 'User Register is Successfull');
    }
    public function delete($id)
    {
        User::Find($id)->delete();
        return redirect()->back()->with('deleteStatus', 'User Delete is Successfull');
    }
}
