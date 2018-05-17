<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:4|max:191',
            'preview' => 'required|min:4',
            'body' => 'required|min:4',
            'category_id' => 'required|integer|exists:categories,id',
            'cover' => 'sometimes|mimes:jpeg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please choose a category',
            'category_id.exists' => 'Fake category you cheeky monkey',
            'cover.mimes' => 'The only accepted file types are: jpeg,bmp and png',
        ];
    }
}
