<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';
    protected $fillable = [
    	'id',
    	'content',
    	'user_id',
    	'created_at', 
    	'status'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
