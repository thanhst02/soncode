<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Maker;

class ProductTypeRequest extends FormRequest
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
        $categories = Category::select('id')->get();
        $category = [];
        foreach ($categories as $value) {
            $category[] = $value->id;
        }
        $countries = Country::select('id')->get();
        $country = [];
        foreach ($countries as $value) {
            $country[] = $value->id;
        }
        $makers = Maker::select('id')->get();
        $maker = [];
        foreach ($makers as $value) {
            $maker[] = $value->id;
        }

        switch ($this->method()) {
            case 'POST':
                {
                    $rules['code'] = 'required|max:255|unique:product_types,code';
                    $rules['name'] = 'required|max:255|unique:product_types,name';
                    $rules['category'] = [
                        'required',
                        Rule::in($category),
                    ];
                    $rules['country'] = [
                        'required',
                        Rule::in($country),
                    ];
                    $rules['maker'] = [
                        'required',
                        Rule::in($maker),
                    ]; 
                    $rules['description'] = 'required';
                    $rules['price'] = 'required|numeric';
                    $rules['image'] = 'required|array|min:4';
                    $rules['image.*'] = 'image';


                    return $rules;
                }
            case 'PUT':
            case 'PATCH':
                {
                    
                }
            default:
                break;
        }
    }

    public function messages()
    {
        $messages['code.required'] = 'Mã sản phẩm không được để trống!';
        $messages['code.max'] = 'Mã sản phẩm không quá 255 ký tự';
        $messages['code.unique'] = 'Mã đã tồn tại';
        $messages['name.required'] = 'Tên sản phẩm không được để trống!';
        $messages['name.max'] = 'Tên sản phẩm không quá 255 ký tự';
        $messages['name.unique'] = 'Tên tương tự đã tồn tại';
        $messages['category.required'] = 'Chọn thể loại sản phẩm!';
        $messages['category.in'] = 'Có lỗi vui lòng tải lại trang';
        $messages['country.required'] = 'Chọn nơi sản xuất sản phẩm!';
        $messages['country.in'] = 'Có lỗi vui lòng tải lại trang';
        $messages['maker.required'] = 'Chọn hãng sản xuất sản phẩm!';
        $messages['maker.in'] = 'Có lỗi vui lòng tải lại trang';
        $messages['price.required'] = 'Không được bỏ trống!';
        $messages['price.numeric'] = 'Phải nhập số!';
        $messages['description.required'] = 'Nhập thông tin sản phẩm!';
        $messages['image.required'] = 'Hình ảnh sẽ tăng độ tin cậy của sản phẩm!';
        $messages['image.min'] = 'Cần tối thiểu 4 hình ảnh cho sản phẩm!';
        $messages['image.*.image'] = 'Không phải hình ảnh!';
        
        return $messages;
    }
}
