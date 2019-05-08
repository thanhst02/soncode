<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $table = 'makers';
    protected $fillable = [
    	'id',
    	'name',
    	'address_id',
    	'status', 
    	'description'
	];
    public $timestamps = false;
    protected $primary_key = 'id';

    public static function maker_product()
    {
        $products = ProductType::select('maker_id')->where('status', 1)->distinct()->get();
        $return = [];
        foreach ($products as $product) {
            $maker = static::where('id', $product->maker_id)->where('status', 1)->first();
            $return[] = [
                'id' => $maker->id,
                'name' => $maker->name,
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
