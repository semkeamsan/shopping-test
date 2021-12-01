<?php

namespace App\Http\Controllers\Admin;

use App\Models\AttributeSet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeSetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = AttributeSet::latest('id')->get();

        return view('admin.attributeSet.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributeSet.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AttributeSet $attributeSet)
    {
        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($attributeSet->validation->rules(), $attributeSet->validation->messages(), $attributeSet->validation->attributes());
        $attributeSet = $attributeSet->create($request->all());
        $attributeSet->translations()->create(request()->all());
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeSet $attributeSet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeSet $attributeSet
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeSet $attributeSet)
    {
        return view('admin.attributeSet.form', compact('attributeSet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeSet $attributeSet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeSet $attributeSet)
    {
        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($attributeSet->validation->rules($attributeSet->id), $attributeSet->validation->messages(), $attributeSet->validation->attributes());
        $attributeSet->update($request->all());
        $attributeSet->translations()->updateOrCreate(['locale' => app()->getLocale()], request()->all());
        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeSet $attributeSet
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeSet $attributeSet)
    {
        $attributeSet->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
