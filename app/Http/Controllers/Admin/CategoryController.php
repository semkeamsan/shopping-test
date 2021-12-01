<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $collection = Category::whereNull('parent_id')->get();
        return view('admin.category.index', compact('collection'));
    }
    public function category($id)
    {
        return Category::with(['children'])->find($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {

        $validate = $request->validate($category->validation->rules(), $category->validation->messages(), $category->validation->attributes());
        $category = $category->create($request->all());
        $category->translations()->create(request()->all());

        if ($request->ajax()) {
            $category->children;
            $category->translations;
            return $category;
        }
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validate = $request->validate($category->validation->rules($category->id), $category->validation->messages(), $category->validation->attributes());
        $category->update($request->all());
        $category->translations()->updateOrCreate(['locale' => app()->getLocale()], request()->all());
        if ($request->ajax()) {
            $category->children;
            $category->translations;
            return $category->refresh();
        }
        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
