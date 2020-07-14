<?php

namespace App\Http\Requests\Subscription;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionCreateRequest extends FormRequest
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
            'email'  => 'required|max:100|unique:subscriptions,email',
            'status'  => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Please give your email id.',
            'email.max'  => 'Please give email maximum of 100 characters.',
            'email.unique'  => 'Sorry, Email (' . $this->email . ') is already exist ! Please give an unique email for subscriptions.',
            'status.required' => 'Please give a subscription status.',
        ];
    }
}
