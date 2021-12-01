<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('admin.account.index');
    }

    public function email(Request $request)
    {
        $rules['email'] = 'required|email|unique:users,email,' . auth()->id();
        $validate =  $request->validate($rules, [], ['email' => __('Email')]);

        // if (Hash::check($request->password, auth()->user()->password)) {
        //     $update = auth()->user()->update(['email' => $request->email]);
        // }
        $update = auth()->user()->update(['email' => $request->email]);

        return  redirect()->back()->with('message', __('Email successfully'));
    }
    public function password(Request $request)
    {
        //$rules['old_password'] = 'required';
        $rules['new_password']     = 'required|min:8';
        $validate =  $request->validate($rules, [], ['old_password' => __('Old password'), 'new_password' => __('New password')]);
        $update = auth()->user()->update([
            'password' => Hash::make($request->new_password)
        ]);
        return  redirect()->back()->with('message', __('Password successfully'));
    }
    public function biography(Request $request)
    {
        $user =  auth()->user();
        $rules = $user->validation->rules(auth()->id());
        unset($rules['password']);
        unset($rules['email']);
        unset($rules['role_id']);
        $validate = $request->validate($rules, $user->validation->messages(), $user->validation->attributes());
        request()->merge(['dob' => new Carbon($request->dob)]);
        auth()->user()->update($request->all());

        return  redirect()->back()->with('message', __('Biography successfully'));
    }

}
