<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            case 'POST': {
                $rules['name'] = 'required|unique:countries,name';
                $rules['iso_code'] = 'required|unique:countries,iso_code';
                $rules['country_code'] = 'required|unique:countries,country_code';
            }
            case 'PUT':
            case 'PATCH': {
                $rules['name'] = 'required';
                $rules['iso_code'] = 'required';
                $rules['country_code'] = 'required';
            }
            default:
                break;
        }
        
        return $rules;
    }

    public function messages()
    {
        $messages['name.required'] = 'Bắt buộc!';
        $messages['name.unique'] = 'Đã tồn tại!';
        $messages['iso_code.required'] = 'Bắt buộc!';
        $messages['iso_code.unique'] = 'Đã tồn tại!';
        $messages['country_code.required'] = 'Bắt buộc!';
        $messages['country_code.unique'] = 'Đã tồn tại!';

        return $messages;
    }
}
