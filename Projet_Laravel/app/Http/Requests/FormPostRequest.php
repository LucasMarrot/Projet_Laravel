<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string','max:255', Rule::unique('sauces')->ignore($this->route()->parameter('sauce'))],
            'manufacturer' => ['required', 'string','max:255'],
            'description' => ['required', 'string'],
            'mainPepper' => ['required', 'string','max:255'],
            'imageUrl' => ['required', 'url'],
            'heat' => ['required', 'integer', 'min:1', 'max:10'],
            'userId' => ['required', 'string']
        ];
    }
}
