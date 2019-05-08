<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'name';
    protected $fillable = [
    	'id',
    	'name',
    	'address_id',
    	'phone_id'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
