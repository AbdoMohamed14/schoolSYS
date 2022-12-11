<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeClassroomRequest extends FormRequest
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

        $id = ($this->classroom)?$this->classroom->id:null;
        return [
            'name' => 'required|string|unique:classrooms,name,' . $id,
            'stage' => 'required|integer',
            'stage_class' => 'required|integer',
            'notes' => 'string',
        ];
    }


}
