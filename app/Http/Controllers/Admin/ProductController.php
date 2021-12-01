<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Option;
use App\Models\Product;
use App\Models\Category;
use App\Models\AttributeSet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function __construct()
    {

        if (request('options')) {
            $options = [];
            foreach (request('options') as $key =>  $option) {
                $values = [];
                foreach ($option['values'] as  $value) {
                    $price_type = @$value['price_type'];
                    unset($value['price_type']);
                    if (!empty(array_filter($value))) {
                        $value['price_type'] = $price_type;
                        $values[] = $value;
                    }
                }
                $option['is_required'] =  request('options.' . $key . '.is_required', 0);
                $option['values'] =  $values;
                $options[] = $option;
            }
            request()->merge(['options' => $options]);
        }

        request()->merge(['slug' => slug(request('slug',  request('name')))]);
        request()->merge(['attributes' => request('attributes', [])]);
        request()->merge(['is_active' => request('is_active', 0)]);
        request()->merge(['downloads' => array_values(array_filter(request('downloads', [])))]);
        request()->merge(['images' => array_values(array_filter(request('images', [])))]);
    }

    public function options()
    {
        $brands = Brand::latest('id')->get();
        $categories = Category::whereNull('parent_id')->latest('id')->get();
        $tax_class = collect();
        $tags = Tag::latest('id')->get();
        $attributeSet = AttributeSet::latest('id')->get();
        $options = Option::where('is_global', 1)->latest('id')->get();
        return compact('brands', 'categories', 'tax_class', 'tags', 'attributeSet', 'options');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Product::latest('id')->get();

        return view('admin.product.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $relations = Product::get();
        return view('admin.product.form', compact('relations')+$this->options());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {

        $validate = $request->validate($product->validation->rules(), $product->validation->messages(), $product->validation->attributes());
        $product = $product->create($request->all());
        $product->translations()->create($request->all());
        $product->related()->attach(request('related', []));
        $meta = $product->meta()->create($request->meta + ['entity' => Product::class]);
        $meta->translations()->create($request->meta['translation']);
        if ($request->tags) {
            $product->tags()->attach($request->tags);
        }
        if ($request->categories) {
            $product->categories()->attach($request->categories);
        }


        foreach (request('attributes', []) as $key => $attribute) {
            $product->attributes()->create($attribute);
        }


        $options = collect();
        foreach (request('options', []) as $o) {
            $option = Option::create((new Option)->validate($o));
            $option->translations()->create($o + ['locale' => app()->getLocale()]);
            $options->add($option);
            foreach (@$o['values'] ?? [] as $v) {
                $value =  $option->values()->create([
                    'price' => @$v['price'],
                    'price_type' => @$v['price_type'],
                ]);
                $value->translations()->create([
                    'locale' => $request->locale,
                    'label' => @$v['label'],
                ]);
            }
        }

        $product->options()->sync($options->pluck('id'));

        return  redirect()->back()->with('message', __('Add successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        $relations = Product::whereNotIn('id', [$product->id])->get();
        return view('admin.product.form', compact('product','relations') + $this->options());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate($product->validation->rules($product->id), $product->validation->messages(), $product->validation->attributes());
        $product->update($request->all());
        $product->translations()->updateOrCreate(['locale' => app()->getLocale()], $request->all());
        $product->related()->sync(request('related', []));
        $meta = $product->meta()->updateOrCreate(['id' => @$request->meta['id']], $request->meta + ['entity' => Product::class]);
        $meta->translations()->updateOrCreate(['locale' => app()->getLocale()], $request->meta['translation']);
        $product->tags()->sync($request->tags);
        $product->categories()->sync($request->categories);

        $product->attributes()->whereNotIn('id', array_column(request('attributes', []), 'id'))->delete();
        foreach (request('attributes',[]) as $key => $attribute) {
            $product->attributes()->updateOrCreate(['id' => @$attribute['id']], $attribute);
        }

        $oldoptions = $product->options;
        $options = collect();
        if ($request->options) {
            foreach ($request->options as  $option) {
                $opt = Option::updateOrCreate(['id' => @$option['id']], $option);
                if (@$option['id']) {
                    unset($option['id']);
                }
                $opt->translations()->updateOrCreate(['locale' => app()->getLocale()], $option);
                $options->add($opt);
                $opt->values()->whereNotIn('id', array_column(@$option['values'] ?? [], 'id'))->delete();
                if (@$option['values']) {
                    foreach ($option['values'] as $key => $value) {
                        $value['locale'] = $request->locale;
                        $val =  $opt->values()->updateOrCreate(['id' => @$value['id']], $value);
                        if (@$value['id']) {
                            unset($value['id']);
                        }
                        $val->translations()->updateOrCreate(['locale' => app()->getLocale()], $value);
                    }
                }
            }
            $product->options()->sync($options->pluck('id'));
        } else {
            foreach ($oldoptions as $opt) {
                $opt->delete();
            }
            $product->options()->sync([]);
        }
        return  redirect()->back()->with('message', __('Edit successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->options()->delete();
        $product->delete();
        return  redirect()->back()->with('message', __('Delete successfully'));
    }
}
