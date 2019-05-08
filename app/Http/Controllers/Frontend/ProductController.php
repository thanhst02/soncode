<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;

class ProductController extends Controller
{
    public function index(Request $request)
    {
    	$title = 'Tất cả sản phẩm';
    	$order_type = 'none';
    	$order = 'asc';
    	$limit = 15;
    	$product_types = ProductType::select('id', 'name', 'sale', 'price')->where('status', 1);
    	switch ($order_type) {
    		case 'date':
    			if ($order == 'asc') {
    				$product_types->orderBy('id','asc');
    			}else{
    				$product_types->orderBy('id','desc');
    			}
    			break;
    		case 'price':
    			if ($order == 'asc') {
    				$product_types->orderBy('price','asc');
    			}else{
    				$product_types->orderBy('price','desc');
    			}
    			break;
    		case 'random':
    				$product_types->inRandomOrder();
    			break;
    		default:
    			break;
    	}
    	$product_types = $product_types->paginate($limit);
    	$products_data = [];
    	foreach ($product_types as $product_type) {
    		$image = ProductType::getImage($product_type->id);
    		$products_data[] = [
    			'id' => $product_type->id,
    			'name' => $product_type->name,
    			'sale' => $product_type->sale,
    			'rate' => $product_type->rate,
    			'price' => $product_type->price,
    			'image' => $image,
    		];
    	}
    	$categories = Category::slidebar();
    	return view('frontend.product',
    	compact('title', 'categories', 'product_types', 'products_data'));
    }
}
