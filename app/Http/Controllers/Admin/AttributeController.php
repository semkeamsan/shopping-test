<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Models\AttributeSet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    public function __construct()
    {
        if (request('values')) {
            $values = [];
            foreach (request('values') as $key => $value) {
                if ($value['name']) {
                    $values[] = $value;
                }
            }
            request()->merge(['values' => $values]);
        }
    }

    public function options()
    {
        $attributeSet = AttributeSet::latest('id')->get();
        return compact('attributeSet');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = Attribute::latest('id')->get();

        return view('admin.attribute.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.form', $this->options());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Attribute $attribute)
    {

        $validate = $request->validate($attribute->validation->rules(), $attribute->validation->messages(), $attribute->validation->attributes());
        $attribute = $attribute->create($request->all());
        $attribute->translations()->create(request()->all());
        foreach ($request->values as $key => $value) {
            $value['locale'] = $request->locale;
            $val =  $attribute->values()->create([
                'index' => $key,
            ]);
            $val->translations()->create($value);
        }

        $meta = $attribute->meta()->create($request->meta + ['entity' => Attribute::class]);
        $meta->translations()->create($request->meta['translation']);

        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.attribute.form', compact('attribute') + $this->options());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($attribute->validation->rules($attribute->id), $attribute->validation->messages(), $attribute->validation->attributes());
        $attribute->update($request->all());
        $attribute->translations()->updateOrCreate(['locale' => app()->getLocale()], request()->all());

        $attribute->values()->whereNotIn('id', array_column($request->values, 'id'))->delete();
        foreach ($request->values as $key => $value) {
            $value['locale'] = $request->locale;
            $val =  $attribute->values()->updateOrCreate(['id' => $value['id']], [
                'index' => $key,
            ]);
            $val->translations()->updateOrCreate(['locale' => app()->getLocale()], $value);
        }

        $meta = $attribute->meta()->updateOrCreate(['id' => @$request->meta['id']], $request->meta + ['entity' => Attribute::class]);
        $meta->translations()->updateOrCreate(['locale' => app()->getLocale()], $request->meta['translation']);


        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
