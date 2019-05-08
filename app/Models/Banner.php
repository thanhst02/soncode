<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';
    protected $fillable = [
    	'id',
    	'header',
    	'content',
    	'image_id', 
    	'link', 
    	'user_id',
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
