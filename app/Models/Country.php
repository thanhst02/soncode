<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductType;


class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = [
    	'id',
    	'name',
    	'iso_code',
    	'country_code',
	];
    public $timestamps = false;
    protected $primary_key = 'id';

    public static function selectform()
    {
        $return = [];
        $country = static::select('id','name')->orderBy('name')->get();
        foreach ($country as $value) {
            $return[$value->id] = $value->name;
        }
        return $return;
    }

    public static function country_product()
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
            'iso_code' => $request->iso_code,
            'country_code' => $request->country_code,
        ]);
    }
    public static function edit($request, $id)
    {
        return static::where('id', $id)->update([
            'name' => $request->name,
            'iso_code' => $request->iso_code,
            'country_code' => $request->country_code,
        ]);
    }
    public static function destroy($id)
    {
        return static::where('id', $id)->update(['status' => 0]);
    }
}
