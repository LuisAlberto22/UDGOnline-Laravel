<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class gradehomeworkRequest extends FormRequest
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
            'score' =>'required|numeric|min:0|max:100',            
            'note' =>'nullable|max:200',
        ];
    }
}
