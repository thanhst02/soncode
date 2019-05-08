<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Classes\UploadFile;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Human;
use App\Models\Address;
use App\Models\Phone;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    protected $fillable = [
    	'id',
        'username',
        'email',
        'password',
    	'human_id',
    	'avatar ',
    	'status', 
        'active',
        'role',
    	'point'
	];
    public $timestamps = false;
    protected $primary_key = 'id';

    public function human()
    {
        return $this->belongsTo( Human::class );
    }

    /**
     * Tạo người dùng mới
     *
     * @param  array  $data
     * @return User
     */
    public static function create(array $data)
    {
        $address_id = null;
        if ($data['address'] != null) {
            $address_id = Address::insertGetId([
                'address' => $data['address']
            ]);
        }
        $phone_id = Phone::insertGetId([
            'phone_mumber' => $data['mobile'],
        ]);
        $human_id = Human::insertGetId([
            'name' => $data['name'],
            'address_id' => $address_id,
            'phone_id' => $phone_id,
        ]);
        $avatar_id = null;
        if ($data['avatar'] != null) {
            $avatar_id = UploadFile::image($data['avatar'], $data['username'].time());
        }
        return User::insert([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'human_id' => $human_id,
            'avatar' => $avatar_id,
        ]);
    }

}
