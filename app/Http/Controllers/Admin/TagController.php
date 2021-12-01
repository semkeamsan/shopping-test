<?php

namespace App\Http\Controllers\Admin;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = Tag::latest('id')->get();

        return view('admin.tag.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tag $tag)
    {
       
        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($tag->validation->rules(), $tag->validation->messages(), $tag->validation->attributes());
        $tag = $tag->create($request->all());
        $tag->translations()->create(request()->all());

        $meta = $tag->meta()->create($request->meta + ['entity' => Tag::class]);
        $meta->translations()->create($request->meta['translation']);

        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.form',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {

        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($tag->validation->rules($tag->id), $tag->validation->messages(), $tag->validation->attributes());
        $tag->update($request->all());
        $tag->translations()->updateOrCreate(['locale' => app()->getLocale()], request()->all());

        $meta = $tag->meta()->updateOrCreate(['id' => @$request->meta['id']], $request->meta + ['entity' => Tag::class]);
        $meta->translations()->updateOrCreate(['locale' => app()->getLocale()], $request->meta['translation']);

        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->meta()->delete();
        $tag->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
