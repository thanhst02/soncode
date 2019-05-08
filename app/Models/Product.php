<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
    	'id',
    	'code',
    	'price',
    	'supplier_id', 
    	'product_type_id', 
    	'description',
    	'status'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
