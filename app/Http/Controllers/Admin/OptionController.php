<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    public function __construct()
    {
        if (request('values')) {
            $values = [];
            foreach (request('values') as $key => $value) {
                $price_type = $value['price_type'];
                unset($value['price_type']);
                if (!empty(array_filter($value))) {
                    $value['price_type'] = $price_type;
                    $values[] = $value;
                }
            }
            request()->merge(['values' => $values]);
        }
        request()->merge(['is_required' => request('is_required', 0)]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = Option::with(['values','translations'])->latest('id')->get();

        return view('admin.option.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.option.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Option $option)
    {

        $validate = $request->validate($option->validation->rules(), $option->validation->messages(), $option->validation->attributes());
        $option = $option->create($request->all());
        $option->translations()->create($request->all());
        foreach ($request->values as $key => $value) {
            $val =  $option->values()->create($value);
            $value['locale'] = $request->locale;
            $val->translations()->create($value);
        }
        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option $option
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        return view('admin.option.form', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Option $option)
    {
        request()->merge(['routes' => explode(',', $request->routes)]);
        $validate = $request->validate($option->validation->rules($option->id), $option->validation->messages(), $option->validation->attributes());
        $option->update($request->all());
        $option->translations()->updateOrCreate(['locale' => app()->getLocale()], request()->all());

        $option->values()->whereNotIn('id', array_column($request->values, 'id'))->delete();
        foreach ($request->values as $key => $value) {
            $value['locale'] = $request->locale;
            $val =  $option->values()->updateOrCreate(['id' => @$value['id']],$value);
            $val->translations()->updateOrCreate(['locale' => app()->getLocale()], $value);
        }

        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
