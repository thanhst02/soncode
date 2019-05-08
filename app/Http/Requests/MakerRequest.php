<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakerRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':{
                $rules['name'] = 'required|unique:makers,name';
            }
            case 'PUT':
            case 'PATCH':{
                $rules['name'] = 'required';
            }
            default:
                break;
        }
        
        return $rules;
    }

    public function messages()
    {
        $messages['name.required'] = 'Bắt buộc!';
        $messages['name.unique'] = 'Tên đã tồn tại!';

        return $messages;
    }
}
