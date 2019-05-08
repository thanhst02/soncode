<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
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
    public function rules(Request $request)
    {   
        $rules['account'] = 'required';
        $account = $request->account;
        $field = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if ($field == 'username') {
            $rules['account'] = 'required|not_in:users,username';
        }else{
            $rules['account'] = 'required|not_in:users,email';
        }
        
        $rules['password'] = [
            'required'
        ];
        return $rules;
    }

    public function messages()
    {
        $messages['account.required'] = 'Chưa nhập account!';
        $messages['account.not_in'] = 'Không tồn tại tài khoản này!';
        $messages['password.required'] = 'Chưa nhập mật khẩu!';

        return $messages;
    }
}
