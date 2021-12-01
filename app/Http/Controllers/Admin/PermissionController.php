<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{

    public function options()
    {
        $roles = Role::get();
        return compact('roles');
    }
    public function filters()
    {
        $roles = Role::whereIn('id', Permission::pluck('role_id'))->get();
        $permissions = Permission::groupBy('slug')->get();
        return compact('roles', 'permissions');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $collection = Permission::whereHas('role', function ($role) {
        //     if (request('role')) {
        //         $role->where('slug', request('role'));
        //     }
        // })->latest('id')->get();

        $collection = Role::whereHas('permissions')->where(function ($role) {
            if (request('role')) {
                $role->where('slug', request('role'));
            }
        })->latest('id')->get();

        return view('admin.permission.index', compact('collection') + $this->filters());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.form', $this->options());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Permission $permission)
    {
        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($permission->validation->rules(), $permission->validation->messages(), $permission->validation->attributes());
        $permission = $permission->create($request->all());
        $permission->translations()->create(request()->all());
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permission.form', $this->options() + compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($permission->validation->rules($permission->id), $permission->validation->messages(), $permission->validation->attributes());
        $permission->update($request->all());
        $permission->translations()->updateOrCreate(['locale' => app()->getLocale()], request()->all());
        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
