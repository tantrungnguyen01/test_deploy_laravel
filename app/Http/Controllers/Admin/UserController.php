<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show table all user
     */
    public function index () {
        $users = DB::table('users')->orderBy('created_at', 'DESC')->get();

        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show form for create user
     */
    public function create () {
        return view('admin.user.create');
    }

    /**
     * Processing push data to table
     * Cmd: php artisan make:request Admin/User/StoreRequest
     */
    public function store (StoreRequest $request) {
        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime;

        DB::table('users')->insert($data);

        return redirect()->route('admin.user.index')->with('success','User created successfully');
    }

    /**
     * Show form for edit user
     */
    public function edit ($id) {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Processing update data to table
     * Cmd: php artisan make:request Admin/User/UpdateRequest
     */
    public function update ($id, UpdateRequest $request) {
        $data = $request->except('_token', 'password_confirmation', 'password');

        if (!empty($request->password)) {
            $request->validate([
                'password' => 'min:8|confirmed'
            ],[
                'password.min' => 'Mat khau cua ban it nhat phai co 8 ky tu',
                'password.confirmed' => 'Hai mat khau khong trung khop'
            ]);

            $data['password'] = bcrypt($request->password);
        }


        $data['updated_at'] = new \DateTime;

        DB::table('users')->where('id', $id)->update($data);

        return redirect()->route('admin.user.index')->with('success','User updated successfully');
    }

    /**
     * Delete a user
     */
    public function destroy ($id) {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('admin.user.index')->with('success','User deleted successfully');
    }
}
