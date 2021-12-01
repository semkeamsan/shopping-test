<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function options()
    {
        //$routes = [];
        // foreach (Route::getRoutes()->getRoutesByName() as $key => $value) {
        //     $a = collect(explode('/',$value->uri()));
        //     if($a->first() == 'admin' && count($a) >= 3){
        //         $routes[$a[1]] = __(Str::title($a[1]).'s');
        //     }
        // }
        $permissions = Permission::where('role_id', 1)->orderBy('index')->get();
        return compact('permissions');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Role::latest('id')->get();
        return view('admin.role.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.form', $this->options());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {

        $validate = $request->validate($role->validation->rules(), $role->validation->messages(), $role->validation->attributes());
        request()->merge(['slug' => Str::lower($request->slug)]);
        $role = $role->create($request->all());
        $role->translations()->create(request()->all());
        $i = 1;
        foreach ($request->permissions as $key => $permission) {
            $permission['index'] = $i;
            $p = $role->permissions()->create($permission);
            foreach ($permission['translations'] as $translation) {
                $p->translations()->create($translation);
            }
            $i++;
        }
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.form', $this->options() + compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validate = $request->validate($role->validation->rules($role->id), $role->validation->messages(), $role->validation->attributes());
        request()->merge(['slug' => Str::lower($request->slug)]);
        $role->update($request->all());
        $role->translations()->updateOrCreate(['locale' => app()->getLocale()], request()->all());
        $permissions = [];

        foreach ($request->permissions as $key => $permission) {
            if (@$permission['routes']) {
                $permissions[] = $permission;
            }
        }
        $role->permissions()->whereNotIn('id', array_column($permissions, 'id'))->delete();
        $i = 1;
        foreach ($permissions as $key => $permission) {
            if (@$permission['routes']) {
                $permission['index'] = $i;
                $permission['underline'] = @$permission['underline'] ?? false;
                $permission['navbar'] = @$permission['navbar'] ?? false;
                $p =  $role->permissions()->updateOrCreate(['id' => @$permission['id']], $permission);
                foreach ($permission['translations'] as $translation) {
                    $p->translations()->updateOrCreate(['id' => @$translation['id']],$translation);
                }
                $i++;
            }
        }
        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
