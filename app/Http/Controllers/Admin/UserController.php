<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function options()
    {
        $roles = Role::latest('id')->get();
        return compact('roles');
    }
    public function filters()
    {
        $roles = Role::whereIn('id', User::pluck('role_id'))->latest('id')->get();
        $genders = collect(['male', 'female']);
        return compact('roles', 'genders');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $collection = User::whereHas('role', function ($role) {
            if (request('role')) {
                $role->where('slug', request('role'));
            }
        })->when(request('gender'), function ($table) {
            $table->where('gender', request('gender'));
        })->latest('id')->get();

        return view('admin.user.index', compact('collection') + $this->filters());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.form', $this->options());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $rules = $user->validation->rules();
        $validate = $request->validate($rules, $user->validation->messages(), $user->validation->attributes());
        request()->merge(['dob' => new Carbon($request->dob)]);
        request()->merge(['password' => Hash::make($request->password)]);
        $user->create($request->all());
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.form', compact('user') + $this->options());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = $user->validation->rules($user->id);
        unset($rules['password']);
        $validate = $request->validate($rules, $user->validation->messages(), $user->validation->attributes());
        request()->merge(['dob' => new Carbon($request->dob)]);
        if ($request->password) {
            request()->merge(['password' => Hash::make($request->password)]);
        } else {
            request()->request->remove('password');
        }
        $user->update($request->all());
        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
