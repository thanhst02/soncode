<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Session;
use App\Models\ProductType;

class CartController extends Controller
{
    public function addCart(Request $request)
    {

        if ($request->get('type')) {
           $id = $request->get('id');
            $quantity = $request->get('quantity');
            if (!ProductType::find($id)) {
                abort(404);
            }
            $product_type = ProductType::select('id', 'name')->where('id', $id)->first();
            $image = ProductType::getImage($id);
            if (!$request->session()->has('session_cart.'.$id)) {
                $request->session()->put('session_cart.'.$id, [
                    'id' => $id,
                    'single' => url('single/'.$id),
                    'name' => $product_type->name,
                    'quantity' => $quantity,
                    'price' => $product_type->price,
                    'sale' => $product_type->sale,
                    'image' => url('public/dataUpload/images/'.$image['image_name'])
                ]);
            }else{
                $value = $request->session()->get('session_cart.'.$id.'.quantity');
                $new_quantity = $quantity + $value ;    
                $request->session()->put('session_cart.'.$id.'.quantity', $new_quantity);
            }
        };
    	$data = $request->session()->get('session_cart');
    	return $data;
    }

    public function deleteCart(Request $request)
    {
    	$id = $request->get('id');
        $request->session()->forget('session_cart.'.$id);
        return $request->session()->get('session_cart');
    }

    public function clearCart(Request $request)
    {
    	$request->session()->forget('session_cart');
    }

    public function viewCart($value='')
    {
        # code...
    }
}
