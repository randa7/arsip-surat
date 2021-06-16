<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ProfileUpdate extends FormRequest
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
            "name" =>'required',
            "image" => ['nullable', 'mimetypes:image/*'],
            "password" => 'nullable',
            "email" => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.unique' => 'Email telah digunakan pengguna lain',
            'image.mimetypes' => 'File harus bertipe image',


        ];
    }
}
