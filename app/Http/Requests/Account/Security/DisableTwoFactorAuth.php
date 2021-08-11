<?php

namespace App\Http\Requests\Account\Security;

use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class DisableTwoFactorAuth extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->twoFactorEnabled();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => ['required', new CurrentPassword()]
        ];
    }
}
