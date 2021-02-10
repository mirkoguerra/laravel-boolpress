<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCreateFormRequest extends FormRequest
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
          'title' => 'bail|required|min:3|max:255',
          'author' => 'bail|required|min:3|max:255',
          'description' => 'bail|required|min:3'
        ];
    }
}
