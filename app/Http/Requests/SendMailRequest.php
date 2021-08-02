<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRequest extends FormRequest
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
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => "required|email",
            'comment' => "required",
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "'Будь ласка, введіть ім'я",
            'last_name.required' => 'Будь ласка, введіть прізвище',
            'email.required' => 'Будь ласка, введіть e-mail',
            'comment.required' => 'Будь ласка, введіть коментар',
        ];
    }
}
