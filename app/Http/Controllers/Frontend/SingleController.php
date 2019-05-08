<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;

class SingleController extends Controller
{
	public function index($id)
	{
		try {
			if (!ProductType::find($id)) {
				abort(404);
			}
			$product_type_data = ProductType::single($id);
			$product_category = ProductType::random('category', $product_type_data['category']->id, 10);
			return view('frontend.single', 
				compact('product_type_data', 'product_category'));
		} catch (Exception $e) {
			abort(404);
		}	
	}
}
