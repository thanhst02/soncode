<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    protected $fillable = [
    	'id',
    	'country_id',
    	'phone_mumber'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
