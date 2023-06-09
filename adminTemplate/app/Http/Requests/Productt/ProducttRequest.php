<?php

namespace App\Http\Requests\Productt;

use Illuminate\Foundation\Http\FormRequest;

class ProducttRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'thumb'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name not empty',
            'thumb.required' => 'Image not empty'
        ];
    }
}
