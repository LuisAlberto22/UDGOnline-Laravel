<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class user extends FormRequest
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
        $user =auth()->user();
        $rules =  [
            'key' => 'prohibited',
            'Career' => 'prohibited',
            'name' => 'string',
            'email' => 'email|unique:App\Models\User,email,'.$user->id,
            'file' => 'mimes:jpg,png,gif'
        ];

        if ($user->hasRole("Alumno")) {
            $rules = array_merge($rules,[
                'name' => 'prohibited'
            ]);
        }
        return $rules;
    }
}
