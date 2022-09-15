<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditNesRequest extends FormRequest
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
            'category_id1' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'author' => ['required', 'string', 'min:2', 'max:250'],
            'status' => ['required', 'string', 'min:5', 'max:15'],
        ];
    }
}
