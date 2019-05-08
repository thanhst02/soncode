<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class SignUpRequest extends FormRequest
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
        $rules = [
            'username' => 'required|min:3|max:255|unique:users,username',
            'name' => 'required|min:3|max:255',
            'email' => 'required|min:3|max:255|email|unique:users,username',
            'mobile' => 'required',
            'password' => 'required|min:4|max:25',
            'password2' => 'required',
            'terms' => 'required',
        ];
        if (Request::get('avatar') != null) {
            $rules['avatar'] = 'image';
        }
        if (Request::get('password2') != Request::get('password')) {
            $rules['password2'] = 'not_in:0';
        }
        
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'username.required' => 'Nhập tên đăng nhập của bạn.',
            'username.min' => 'Vui lòng nhập ít nhất 3 ký tự.',
            'username.max' => 'Vui lòng nhập tối đa 255 ký tự.',
            'username.unique' => 'Tên đăng nhập đã được sử dụng.',
            'name.required' => 'Nhập tên đầy đủ của bạn.',
            'name.min' => 'Vui lòng nhập ít nhất 3 ký tự.',
            'name.max' => 'Vui lòng nhập tối đa 255 ký tự.',
            'email.required' => 'Nhập địa chỉ email!',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'email.min' => 'Vui lòng nhập ít nhất 3 ký tự.',
            'email.max' => 'Vui lòng nhập tối đa 255 ký tự.',
            'mobile.required' => 'Nhập số điện thoại',
            'mobile.unique' => 'Số điện thoại đã được sử dụng.',
            'password.required' => 'Nhập mật khẩu.',
            'password.min' => 'Vui lòng nhập ít nhất 4 ký tự.',
            'password.max' => 'Vui lòng nhập tối đa 25 ký tự.',
            'password2.required' => 'Nhập lại mật khẩu.',
            'password2.not_in' => 'Nhập lại mật khẩu không đúng.',
            'terms.required' => 'Bạn phải đồng ý với các điều khoản.',
            'avatar.image' => 'Không phải hình ảnh.',
        ];
        return $messages;
    }
}
