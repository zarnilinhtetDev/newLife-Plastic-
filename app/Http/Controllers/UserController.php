<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function user_register()
    {
        $showUser_data =  User::latest()->get();
        return view('blade.users', compact('showUser_data'));
    }

    public function user_store(Request $request)
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


        return redirect()->back()->with('success', 'User registration is successful');
    }



    public function delete_user($id)
    {
        $user_delete = User::find($id);
        $user_delete->delete();

        return redirect()->back()->with('delete_success', ' User delete is successful');
    }



    //Excel User

    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * Import a file and store it temporarily before processing.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt|max:2048', // Add validation rules for file uploads
        ]);

        $path = $request->file('file')->store('temp');

        Excel::import(new UsersImport, storage_path('app/' . $path));

        return back()->with('success', 'File imported successfully.');
    }

    /**
     * Export data to an Excel file and force download it.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
