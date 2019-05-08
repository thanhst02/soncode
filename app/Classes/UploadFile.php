<?php
namespace App\Classes;

use App\Models\Image;

class UploadFile
{
    private static $image_path = 'public/dataUpload/';

    /**
     * Upload file vào thư mục và lưu tên và bảng dữ liệu
     * @param  [input] $data      [image ]
     * @param  [string] $file_name [tên của hình ảnh]
     * @return [id]            [id trong database]
     */
    public static function image($data, $file_name)
    {
        $destinationPath = public_path(static::$image_path);
        $extension = $data->getClientOriginalExtension();
        $fileName = $file_name . '.' . $extension;
        $data->move($destinationPath.'images', $fileName);
        $imageId = Image::insertGetId(['image_name' => $fileName]);
        return $imageId;
    }
}