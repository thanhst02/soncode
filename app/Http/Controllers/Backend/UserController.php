<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Human;

class UserController extends Controller
{
   	public function index()
    {
    	$user_paginate = User::where('status', 1)->paginate(10);
    	$users = [];
    	foreach ($user_paginate as $value) {
    		$name = ''; $image = '';
    		if ($value->human_id) {
    			$name = Human::where('id', $value->human_id)->first()->name;
    		}
    		if ($value->avatar){
    			$image = Human::where('id', $value->avatar)->first()->image_name;;
    		}
    		$users[] = [
    			'id' => $value->id,
    			'username' => $value->username,
    			'email' => $value->email,
    			'role' => $value->role,
    			'name' => $name,
    			'avatar' => $image,
    		];
    	}
    	return view('backend.user.index',
    		compact('users', 'user_paginate')
    	);
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(UserRequest $request)
    {
    	$response = User::store($request);
        if ($response) {
            return redirect()->route('backend.user.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.user.index')->with([
                'status' => false,
            ]);
        }
    }

    public function edit($id)
    {
        if (!User::find($id)) {
            abort(404);
        }
        $user = User::where('id', $id)->first();
    	return view('backend.user.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
    	$response = User::edit($request, $id);
        if ($response) {
            return redirect()->route('backend.user.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.user.index')->with([
                'status' => false,
            ]);
        }
    }
    public function destroy($id)
    {
        $response = User::destroy($id);
        if ($response) {
            return redirect()->route('backend.user.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.user.index')->with([
                'status' => false,
            ]);
        }
    }
}
