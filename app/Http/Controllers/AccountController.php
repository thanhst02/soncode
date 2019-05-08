<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Session;
use App\Classes\UploadFile;


class AccountController extends Controller
{
    public function login(LoginRequest $request)
    {
    	$account = $request->get('account');
    	$password = $request->get('password');
    	$field = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    	$login = false;
    	switch ($field) {
    		case 'email':
    			if (Auth::attempt(['email' => $account, 'password' => $password, 'active' => 1])) {
    				$login = true;
    			}
    			break;
    		case 'username':
    			if (Auth::attempt(['username' => $account, 'password' => $password, 'active' => 1])) {
		    		$login = true;
		    	}
    			break;
    		default:
    			# code...
    			break;
    	}
    	if ($login) {
    		if(Auth::user()->role == '1'){
    			return redirect()->route('backend.index');
    		}else
    			return redirect()->route('frontend.index');
    	}else
        	return redirect()->back()->with('login-status-error', ' Tài khoản hoặc Mật khẩu không đúng!');
    }
    
    public function signUp()
    {  
        return view('frontend.account.signup');
    }
    
    public function signUpPost(SignUpRequest $request)
    {
    	$user = User::create($request->all());
        if ($user) {
            return redirect()->route('frontend.index')->with('status-success', 'Tạo tài khoản thành công!');
        } else
            return redirect()->back()->with('status-error', 'Tạo tài khoản thất bại vui lòng thử lại sau!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('frontend.index');
    }
}
