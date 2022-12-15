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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:20',
            'address' => 'required|max:50',
            // 'role' => 'required',
            'photo' => 'max:1024'
        ];
    }

    public function message()
    {
        return[
            'name.required' => 'entering the username is mandatory',
            'name.max' => 'username cannot be more than 50 characters',
            'email.required' => 'email address is mandatory',
            'email.email' => 'you must enter a valid email address',
            'email.unique' => 'the email address must be registered',
            'phone.max' => 'the phone number cannot have more than 20 characters',
            // 'role.required' => 'you must assign a role',
            'photo.max' => 'The users photo cannot be more than 1 Mb!'
        ];
    }
}
