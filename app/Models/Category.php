<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductType;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
    	'id',
    	'name',
    	'description'
	];
    public $timestamps = false;
    protected $primary_key = 'id';

    public static function slidebar()
    {
    	$products = ProductType::select('category_id')->where('status', 1)->distinct()->get();
        $return = [];
        foreach ($products as $product) {
            $category = static::select('id', 'name')->where('id', $product->category_id)->first();
            $quantity = ProductType::select('id')->where('status', 1)->where('category_id', $category->id)->get()->count();
            $return[] = [
                'id' => $category->id,
                'name' => $category->name,
                'quantity' => $quantity
            ];
        }
        return $return;
    }

    public static function category_product()
    {
        $products = ProductType::select('country_id')->where('status', 1)->distinct()->get();
        $return = [];
        foreach ($products as $product) {
            $country = static::where('id', $product->country_id)->first();
            $return[] = [
                'id' => $country->id,
                'name' => $country->name,
            ];
        }
        return $return;
    }

    public static function store($request)
    {
        return static::insert([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    public static function edit($request, $id)
    {
        return static::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }
    public static function destroy($id)
    {
        return static::where('id', $id)->update(['status' => 0]);
    }
}
