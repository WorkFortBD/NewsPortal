<?php

namespace App\Http\Requests\Poll;

use Illuminate\Foundation\Http\FormRequest;

class PollCreateRequest extends FormRequest
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
            'title'  => 'required|max:100',
            'status'  => 'required',
            'start_date'  => 'required',
            'end_date'  => 'required'
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
            'title.required' => 'Please give a poll title.',
            'title.max'  => 'Please give poll maximum of 100 characters.',
            'status.required' => 'Please give a poll status.',
            'start_date.required' => 'Please give a poll start date.',
            'end_date.required' => 'Please give a poll end date.',
        ];
    }
}
