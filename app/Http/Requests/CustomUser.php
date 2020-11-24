<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomUser extends FormRequest
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
        $id = $this->user != null ? $this->user->id : "";
        return [
            'name'=>['required','sometimes',Rule::unique('custom_users')->ignore($id)],
            'email'=>['required','sometimes','email'],
            'gender'=>['required','sometimes','min:1','max:1', Rule::in(['M', 'F', 'X'])],
            'birthday'=>'required|sometimes|date|date_format:d-m-Y'
        ];
    }

    public function messages()
    {
        return [
            'gender.in' => 'There are just 3 options acceptable: M , F or X',
        ];
    }


}
