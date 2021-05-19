<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class homeworkRequest extends FormRequest
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
            'name' => 'required|max:60',
            'description' => 'required|max:600',
            'files' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'delivery_date' => 'nullable|date',
        ];
    }
}