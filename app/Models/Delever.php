<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delever extends Model
{
    protected $table = 'delivers';
    protected $fillable = [
    	'id',
    	'human_id'
	];
    public $timestamps = false;
    protected $primary_key = 'id';
}
