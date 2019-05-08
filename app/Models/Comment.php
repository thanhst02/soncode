<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
    	'id',
    	'content',
    	'sub_comment',
    	'product_type_id', 
    	'i_like', 
    	'i_dislike'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
