<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = [
    	'id',
    	'image_name'
	];
    public $timestamps = false;
    protected $primary_key = 'id';

    public function user()
    {
        return $this->hasOne( User::class, 'avatar' );
    }
}
