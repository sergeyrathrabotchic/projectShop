<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'catagory_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:3', 'max:250'],
            'author' => ['required', 'string', 'min:2', 'max:250'],
            'status' => ['required', 'string', 'min:5', 'max:15'],
        ];
    }
}
