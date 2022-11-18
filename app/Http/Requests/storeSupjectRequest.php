<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeSupjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_en' => 'required|string|max:50',
            'name_ar' => 'required|string|max:50',
            'image' =>   'image',
            'stage_class' => 'required|integer',
        ];
    }
}
