<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
    	'id',
    	'name',
    	'start_date',
    	'end_date', 
    	'user_id', 
    	'status',
    	'created_at',
    	'updated_at'
	];
    public $timestamps = true;
    protected $primary_key = 'id';
}
