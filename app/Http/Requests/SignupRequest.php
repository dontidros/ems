<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|min:2|max:50',
            //checks on the DB if this email exists 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20|confirmed'

        ];
    }
}
