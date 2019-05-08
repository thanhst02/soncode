<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'citys';
    protected $fillable = [
    	'id',
    	'name',
    	'country_id'
	];
    public $timestamps = false;
    protected $primary_key = 'id';

    /**
     * list city for select form
     * @param  [type] $id [country_id]
     * @return [array]
     */
    public static function selectform($id)
    {
        $return = [];
        $citys = static::select('id','name')->where('country_id', $id)->orderBy('name')->get();
        foreach ($citys as $value) {
            $return[$value->id] = $value->name;
        }
        return $return;
    }
}
