<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeParentRequest extends FormRequest
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

        $id =($this->teacher)?$this->teacher->id:null;

        return [
            'name_ar'=> 'required|string|max:50|unique:teachers,name_ar,'.$id,
            'name_en'=> 'required|string|max:50|unique:teachers,name_en,'.$id,
            'email'  => 'nullable|email|unique:teachers,email,'.$id,
            'phone'  => 'required|string|unique:teachers,phone,'.$id,
            'address'=> 'required|string',
        ];

    }
}
