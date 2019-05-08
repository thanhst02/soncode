<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
    	'id',
    	'code',
    	'status',
    	'order_date', 
    	'customer_id', 
    	'user_id'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
