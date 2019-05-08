<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductType;
use App\Models\Image;
use App\Models\Category;
use App\Models\Country;
use App\Models\Maker;
use App\Models\Product;
use App\Models\Rate;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        try {
            $title = 'Trang chủ';
            $order_type = 'none';
            if ($request->has('order-type')) {
                $order_type = $request->get('order-type');
            }
            $order = 'asc';
            if ($request->has('order')) {
                $order = $request->get('order');
            }
            $limit = 15;
            if ($request->has('page-display')) {
                $limit = intval($request->get('page-display'));
            }
            $product_types = ProductType::select('id', 'name', 'sale', 'price')->where('status', 1);
            switch ($order_type) {
                case 'price':
                    if ($order == 'desc') {
                        $product_types->orderBy('price','desc');
                    }else{
                        $product_types->orderBy('price');
                    }
                    break;
                case 'random':
                        $product_types->inRandomOrder();
                    break;
                default:
                    if ($order == 'desc') {
                        $product_types->orderBy('id','desc');
                    }else{
                        $product_types->orderBy('id');
                    }
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
        } catch (Exception $e) {
            abort(404);
        }
    }

    public function search(Request $request)
    {
        $keywork = $request->get('keywork');
    	$title = 'Tìm kiếm: '.$keywork;
        $order_type = 'none';
        if ($request->has('order-type')) {
            $order_type = $request->get('order-type');
        }
        $order = 'asc';
        if ($request->has('order')) {
            $order = $request->get('order');
        }
        $limit = 15;
        if ($request->has('page-display')) {
            $limit = intval($request->get('page-display'));
        }
        $product_types = ProductType::select('id', 'name', 'sale', 'price')->where('status', 1)->where('name', 'like', '%'. $keywork .'%');
        switch ($order_type) {
            case 'price':
                if ($order == 'desc') {
                    $product_types->orderBy('price','desc');
                }else{
                    $product_types->orderBy('price');
                }
                break;
            case 'random':
                    $product_types->inRandomOrder();
                break;
            default:
                if ($order == 'desc') {
                    $product_types->orderBy('id','desc');
                }else{
                    $product_types->orderBy('id');
                }
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
        compact('keywork', 'title', 'categories', 'product_types', 'products_data'));
    }

    public function categoryFilder(Request $request, $id)
    {
        try {
            if(!Category::find($id)){
                abort(404);
            }
            $category = Category::select('name')->where('id', $id)->first();
            $title = $category->name;
            $order_type = 'none';
            if ($request->has('order-type')) {
                $order_type = $request->get('order-type');
            }
            $order = 'asc';
            if ($request->has('order')) {
                $order = $request->get('order');
            }
            $limit = 15;
            if ($request->has('page-display')) {
                $limit = intval($request->get('page-display'));
            }
            $product_types = ProductType::select('id', 'name', 'sale', 'price')->where('status', 1)->where('category_id', $id);
            switch ($order_type) {
                case 'price':
                    if ($order == 'desc') {
                        $product_types->orderBy('price','desc');
                    }else{
                        $product_types->orderBy('price');
                    }
                    break;
                case 'random':
                        $product_types->inRandomOrder();
                    break;
                default:
                    if ($order == 'desc') {
                        $product_types->orderBy('id','desc');
                    }else{
                        $product_types->orderBy('id');
                    }
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
            compact('id','title', 'categories', 'product_types', 'products_data'));
        } catch (Exception $e) {
            abort(404);
        }
        
    }

    public function countryFilder(Request $request, $id)
    {
        try {
            if(!Country::find($id)){
                abort(404);
            }
            $country = Country::select('name')->where('id', $id)->first();
            $title = $country->name;
            $order_type = 'none';
            if ($request->has('order-type')) {
                $order_type = $request->get('order-type');
            }
            $order = 'asc';
            if ($request->has('order')) {
                $order = $request->get('order');
            }
            $limit = 15;
            if ($request->has('page-display')) {
                $limit = intval($request->get('page-display'));
            }
            $product_types = ProductType::select('id', 'name', 'sale', 'price')->where('status', 1)->where('country_id', $id);
            switch ($order_type) {
                case 'price':
                    if ($order == 'desc') {
                        $product_types->orderBy('price','desc');
                    }else{
                        $product_types->orderBy('price');
                    }
                    break;
                case 'random':
                        $product_types->inRandomOrder();
                    break;
                default:
                    if ($order == 'desc') {
                        $product_types->orderBy('id','desc');
                    }else{
                        $product_types->orderBy('id');
                    }
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
            compact('id','title', 'categories', 'product_types', 'products_data'));
        } catch (Exception $e) {
            abort(404);
        }
        
    }

    public function makerFilder(Request $request, $id)
    {
        try {
            if(!Maker::find($id)){
                abort(404);
            }
            $maker = Maker::select('name')->where('id', $id)->first();
            $title = 'Nhãn hiệu: '.$maker->name;
            $order_type = 'none';
            if ($request->has('order-type')) {
                $order_type = $request->get('order-type');
            }
            $order = 'asc';
            if ($request->has('order')) {
                $order = $request->get('order');
            }
            $limit = 15;
            if ($request->has('page-display')) {
                $limit = intval($request->get('page-display'));
            }
            $product_types = ProductType::select('id', 'name', 'sale', 'price')->where('status', 1)->where('maker_id', $id);
            switch ($order_type) {
                case 'price':
                    if ($order == 'desc') {
                        $product_types->orderBy('price','desc');
                    }else{
                        $product_types->orderBy('price');
                    }
                    break;
                case 'random':
                        $product_types->inRandomOrder();
                    break;
                default:
                    if ($order == 'desc') {
                        $product_types->orderBy('id','desc');
                    }else{
                        $product_types->orderBy('id');
                    }
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
            compact('id','title', 'categories', 'product_types', 'products_data'));
        } catch (Exception $e) {
            abort(404);
        }
    }
}
