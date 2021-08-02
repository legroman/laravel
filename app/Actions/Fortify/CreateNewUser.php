<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        $firmRules = array_key_exists('firm_name', $input) ? ['required', 'string', 'max:255'] : ['nullable'];

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'is_legal_entity' => ['required'],
            'taxpayer_identification_number' => ['required', 'string', 'max:255'],
            'firm_name' => $firmRules,
            'g-recaptcha-response' => 'required|captcha',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ],
            [
                'password.confirmed' => 'Паролі не співпадають.',
                'g-recaptcha-response.required' => 'Будь ласка, підтвердіть що ви не робот.'
            ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'city' => $input['city'],
            'address' => $input['address'],
            'is_legal_entity' => $input['is_legal_entity'],
            'taxpayer_identification_number' => $input['taxpayer_identification_number'],
            'firm_name' => $input['firm_name'] ?? '',
            'password' => Hash::make($input['password']),
        ]);

        $user
            ->addMedia(public_path('images/no-image.jpg'))
            ->withCustomProperties(['mime-type' => 'image/jpg'])
            ->preservingOriginal()
            ->toMediaCollection('profile_img');

        return $user;
    }
}
