<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfflineShop extends Model
{
    protected $table = 'offline_shops';
    protected $fillable = [
    	'id',
    	'name',
    	'map',
    	'address_id', 
    	'start_date',
    	'phone_id',
    	'user_id',
    	'status'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
