<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonalRequest extends FormRequest
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
            'FIO' => ['required'],
            'sub_addr' => ['required','max:5'],
            'addres_id' => ['required'],
        ];
    }
}
