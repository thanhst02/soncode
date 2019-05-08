<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
    	'id',
    	'address',
    	'city_id',
    	'status', 
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
