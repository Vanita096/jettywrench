<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrganization extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create-tenants');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'subdomain' => [
                'required',
                'alpha_num',
                'unique:organizations',
                'max:50',
                Rule::notIn([
                    'admin',
                    'www',
                    'ww',
                    'wwww',
                    'support',
                    'administrator',
                    'blog',
                    'dashboard',
                    'api',
                    'cache',
                    'news',
                    'email',
                    'mail'
                ])
            ],
            'description' => 'required|string|max:500',
            'website' => 'nullable|string|max:255'
        ];
    }
}
