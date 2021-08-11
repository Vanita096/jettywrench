<?php

namespace App\Http\Requests\Account\Security;

use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class StorePassword extends FormRequest
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
            'password' => ['required', new CurrentPassword()],
            'new_password' => 'required|string|min:6|confirmed|different:password',
            'new_password_confirmation' => 'required'
        ];
    }
}
