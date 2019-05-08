<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    public function index()
    {
    	return View('backend.index');
    }
}
