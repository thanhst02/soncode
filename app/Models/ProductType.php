<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\Category;
use App\Models\Country;
use App\Models\Maker;
use App\Models\Product;
use App\Models\Rate;
use App\Classes\UploadFile;
use DB;

class ProductType extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
    	'id',
        'code',
        'name',
    	'category_id',
    	'description',
    	'tag', 
    	'maker_id', 
    	'country_id',
        'rate',
    	'status'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
    public $image_path = 'public/dataUpload/images';

    public function image()
    {
        return $this->belongsToMany( Image::class, 'product_type_image', 'product_type_id', 'image_id' );
    }
    /**
     * =======================
     * Frontend Start
     */
    
    public static function getImage($id, $type = null)
    {
        $product_type = static::find($id);
        if (!$product_type) {
            abort(404);
        }
        $image = [];
        switch ($type) {
            case 'all':
                $images = $product_type->image()->select('images.image_name')->orderBy('order')->get();
                foreach ($images as $value) {
                    $image[] = $value->image_name;
                }
                break;
            default:
                $image = $product_type->image()->select('images.image_name')->where('order', 1)->first();
                break;
        }
        return $image;
    }

    public static function newProduct($limit = 12)
    {
        $product_types = static::select('id', 'name', 'category_id')->where('status', 1)->orderBy('id', 'desc')->limit($limit)->get();
        $new_product = [];
        foreach ($product_types as $product_type) {
            $image = static::getImage($product_type->id);
            $category = Category::select('name')->where('id', $product_type->category_id)->first();
            $new_product[] = [
                'product_type_id' => $product_type->id,
                'image' => $image,
                'product_name' => $product_type->name,
                'category' => $category['name'],
            ];
        }

        return $new_product;
    }

    public static function random($type, $id, $limit = 12)
    {
        switch ($type) {
            case 'category':
                $product_random = ProductType::select('id', 'name', 'category_id')->where( 'category_id', $id )->where('status', 1)->inRandomOrder()->limit($limit)->get();
                $products = [];
                foreach ($product_random as $product_type) {
                    $image = static::getImage($product_type->id);
                    $category = Category::select('name')->where('id', $product_type->category_id)->first();
                    $products[] = [
                        'product_type_id' => $product_type->id,
                        'image' => $image,
                        'product_name' => $product_type->name,
                        'category' => $category['name'],
                    ];
                }
                break;
            
            default:
                # code...
                break;
        }
        return $products;
    }

    public static function single($id)
    {
        $product_type = static::where('id', $id)->where('status', 1)->first();
        if (!$product_type) {
            abort(404);
        }

        //color
        $color = [];
        $quantity = 0;
        $products_quantity = Product::select('quantity')->where('product_type_id', $id)->where('status', 1)->get();
        foreach ($products_quantity as $product) {
            $quantity += $product->quantity;
        }
        $products_color = Product::select('color')->where('product_type_id', $id)->where('status', 1)->distinct()->get();
        foreach ($products_color as $product) {
            $color[] = $product->color;
        }
        $category = Category::select('id', 'name')->where('id', $product_type->category_id)->first();
        $country = Country::select('id', 'name')->where('id', $product_type->country_id)->first();
        $maker = Maker::select('id', 'name')->where('id', $product_type->maker_id)->first();
        $images = static::getImage($id, $type = 'all');
        // $rate = Rate::where('product_type_id', $id)->avg('point');
        $review = Rate::where('product_type_id', $id)->count();

        $tag = explode(",",$product_type->tag);
        return [
            'id' => $id,
            'code' => $product_type->code,
            'name' => $product_type->name,
            'description' => $product_type->description,
            'quantity' => $quantity,
            'colors' => $color,
            'category' => $category,
            'country' => $country,
            'maker' => $maker,
            'images' => $images,
            'price' => $product_type->price,
            'sale' => $product_type->sale,  
            'rate'=> $product_type->rate,
            'review' => $review,
            'tag' => $tag
        ];
    }

    /**
     * =======================
     * Frontend End
     */
    

    /**
     * =======================
     * Backend Start
     */
    
    public static function store($request)
    {
        $code = $request->input('code');
        $name = $request->input('name');
        $category = $request->input('category');
        $country = $request->input('country');
        $maker = $request->input('maker');
        $tag = $request->input('tag');
        $description = $request->input('description');
        $images = $request->file('image');
        $price = $request->file('price');

        $id = static::insertGetId([
            'code' => $code,
            'name' => $name,
            'category_id' => $category,
            'country_id' => $country,
            'maker_id' => $maker,
            'tag' => $tag,
            'price' => $price,
            'description' => $description
        ]);
        if ($id) {
            $indexImage = 1;
            foreach ($images as $image) {
                $fileName = $code . '-'. $indexImage;
                $imageId = UploadFile::image($image, $fileName);
                if ($imageId) {
                    DB::table('product_type_image')->insert([
                        'product_type_id' => $id,
                        'image_id' => $imageId,
                        'order' => $indexImage
                    ]);
                }else{
                    return false;
                }
                $indexImage++;
            }
        }else return false;

        return true;
    }

    public static function destroy($id)
    {
        if (!static::find($id)) {
            abort(404);
        }
        $response = static::where('id', $id)->update(['status' => 0]);
    }
    /**
     * =======================
     * Backend End
     */
}
