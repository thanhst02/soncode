<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'product_types';
    protected $fillable = [
    	'id',
    	'permission_key',
    	'pater_id',
    	'name'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
