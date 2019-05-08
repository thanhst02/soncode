<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';
    protected $fillable = [
    	'id',
    	'point',
    	'product_type_id',
    	'user_id'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
