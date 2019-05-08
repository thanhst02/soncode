<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Human extends Model
{
    protected $table = 'humans';
    protected $fillable = [
    	'id',
    	'name',
    	'address_id',
    	'phone_id', 
    	'status'
	];
    public $timestamps = false;
    protected $primary_key = 'id';

    public function user()
    {
        return $this->hasOne( User::class, 'human_id' );
    }
}
