<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class PermissionFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id = null)
    {
        $rules = [
            'slug'     => 'required|unique:roles,slug,' . $id,
            'routes'     => 'required',
            'role_id'     => 'required',
            'name'     => 'required',
        ];


        return $rules;
    }
    public function attributes()
    {

        foreach ($this->rules() as $key => $value) {
            $attributes[$key] = __(Str::title($key));
        }
        $attributes = ['role_id' => __('Role')];
        return $attributes;
    }
}
