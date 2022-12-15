<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'required|min:8',
            'passwordnew' => 'required|min:8',
            'passwordnew_confirmation' => 'required|same:passwordnew'
        ];
    }

    public function message()
    {
        return[
            'password.required' => 'you must enter a password',
            'password.min' => 'the password must contain at least 8 characters',
            'passwordnew.min' => 'the password must contain at least 8 characters',
            'password_confirmation.required' => 'you must enter a password confirmation',
            'password_confirmation.same' => 'the password must be identical',
        ];
    }
}
