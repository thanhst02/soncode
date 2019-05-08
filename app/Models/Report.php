<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = [
    	'id',
    	'content',
    	'user_id ',
    	'admin_user_id ', 
    	'support_content ', 
    	'created_at',
    	'status'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
