<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $collection = Brand::latest('id')->get();
        return view('admin.brand.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Brand $brand)
    {
        $validate = $request->validate($brand->validation->rules(), $brand->validation->messages(), $brand->validation->attributes());
        $brand = $brand->create($request->all());
        $brand->translations()->create($request->all());
        $meta = $brand->meta()->create($request->meta + ['entity' => Brand::class]);
        $meta->translations()->create($request->meta['translation']);
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.form', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $validate = $request->validate($brand->validation->rules($brand->id), $brand->validation->messages(), $brand->validation->attributes());
        $brand->update($request->all());
        $brand->translations()->updateOrCreate(['locale' => app()->getLocale()], $request->all());

        $meta = $brand->meta()->updateOrCreate(['id' => @$request->meta['id']], $request->meta + ['entity' => Brand::class]);
        $meta->translations()->updateOrCreate(['locale' => app()->getLocale()], $request->meta['translation']);

        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->meta()->delete();
        $brand->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
