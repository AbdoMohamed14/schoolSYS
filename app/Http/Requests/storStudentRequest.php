<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storStudentRequest extends FormRequest
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
        $id = ($this->student)?$this->student->id:null;
        return [
            'name_ar'    => 'required|string|max:50|unique:students,name_ar,'.$id,
            'name_en'    => 'required|string|max:50|unique:students,name_en,'.$id,
            'blood'      => 'required|string',
            'image'      => 'nullable|image',
            'address'    => 'required|string',
            'stage_class'=> 'required|integer',
            'classroom'  => 'required|integer',
            'parent'     => 'required|integer',
            'religion'   => 'required|string',

        ];
    }
}
