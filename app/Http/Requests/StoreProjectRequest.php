<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'project_title' => 'required|unique:projects|max:200',
            'description' => 'nullable',
            'img' => 'nullable|image|max:6000',
            'type_id'=> 'nullable|exists:types,id',
            'technologies'=> 'exists:technologies,id'
        ];
    }
}
