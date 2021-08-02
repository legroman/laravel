<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $user_id = $this->user()->id;
        return [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => "required|unique:users,email,$user_id|max:255",
            'phone' => "required|unique:users,phone,$user_id|max:255",
            'taxpayer_identification_number' => 'required|max:255',
            'city' => 'required',
            'address' => 'required',
            'firm_name' => 'required',
        ];
    }

    public function messages()
    {
        $code = $this->user()->legal_entity ? 'ЄДРПОУ' : 'ІПН';

        return [
            'name.required' => "'Будь ласка, введіть ім'я",
            'last_name.required' => 'Будь ласка, введіть прізвище',
            'email.required' => 'Будь ласка, введіть e-mail',
            'email.unique' => 'Такий e-mail вже зареєстрований',
            'phone.required' => 'Будь ласка, введіть телефон',
            'phone.unique' => 'Такий телефон вже зареєстрований',
            'city.required' => 'Будь ласка, введіть місто',
            'address.required' => 'Будь ласка, введіть адресу',
            'firm_name.required' => 'Будь ласка, введіть найменування',
            'taxpayer_identification_number.required' => "Будь ласка, введіть $code",
        ];
    }
}
