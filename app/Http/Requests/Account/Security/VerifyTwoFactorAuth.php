<?php

namespace App\Http\Requests\Account\Security;

use App\Models\User;
use App\Rules\ValidTwoFactorToken;
use App\TwoFactor\TwoFactor;
use Illuminate\Foundation\Http\FormRequest;

class VerifyTwoFactorAuth extends FormRequest
{
    protected $twofactor;

    public function __construct(TwoFactor $twofactor)
    {
        //parent::__construct();
        $this->twofactor = $twofactor;
    }

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

        if (session()->has('two_factor')) {
            $this->setUserResolver($this->userResolver());
        }

        return [
            'token' => ['required', new ValidTwoFactorToken($this->user(), $this->twofactor)]
        ];
    }

    protected function userResolver()
    {
        return function() {
            return User::find(session('two_factor')->user_id);
        };
    }
}
