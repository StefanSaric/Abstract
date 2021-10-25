<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view('admin.users.allusers', ['active' => 'allUsers', 'users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create',['active' => 'addUser']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'unique:users'],
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        //setting encription for password
        $request->merge(array('password' => bcrypt($request->input('password'))));
        $user = User::create($request->all());
        $user->save();

        Session::flash('message', 'success_' . __('User is added!'));
        return redirect('admin/users');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', ['active' => 'addUser', 'user' => $user]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'unique:users,email,' . $request->user_id],
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $id = $request->user_id;
        $user = User::find($id);
        $user->update($request->except(['password']));
        //changing password
        if (isset($request->password) && $request->password != '') {
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        Session::flash('message', 'success_' . __('Official is edited!'));
        return redirect('admin/users');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('message', 'info_' . __('User is deleted!'));
        return redirect('admin/users');
    }
}
