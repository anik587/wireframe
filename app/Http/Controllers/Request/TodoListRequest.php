<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoListRequest extends FormRequest
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
            'name' => 'bail|required|min:4',
            'type' => 'bail|required|min:4',
            'status' => 'bail|required|numeric|in:1,2,3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Todo List Name Required',
            'name.min' => 'Todo Lost Name Minimum 4 character',
            'type.required' => 'Todo List Type Required',
            'type.min' => 'Todo Lost Type Minimum 4 character',
            'checkLevel.required' => 'Todo Lost Status Required',
            'checkLevel.numeric' => 'Todo Lost Status Be A Number',
            'checkLevel.in' => 'Todo Lost must be one of [ 1, 2, 3]',

        ];
    }
}
