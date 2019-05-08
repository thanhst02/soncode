<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = [
    	'id',
    	'user_id',
    	'human_id',
    	'code'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
