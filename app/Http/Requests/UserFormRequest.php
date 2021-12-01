<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        return [
            'name'      => 'required',
            'email'     => 'required|unique:users,email,' . $id,
            'password'  => 'required|min:8',
            'gender'   => 'required',
            'dob'     => 'required',
            'role_id' => 'required',
            'phone' => 'required|unique:users,phone,' . $id,
        ];
    }
    public function attributes()
    {
        foreach ($this->rules() as $key => $value) {
            $attributes[$key] = __(Str::title($key));
        }
        $attributes = [
            'role_id'  => __('Role'),
            'dob'   => __('Date of Birth'),
        ];
        return $attributes;
    }
}
