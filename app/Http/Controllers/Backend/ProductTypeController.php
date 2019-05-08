<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ProductTypeRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Maker;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $product_types = ProductType::select('id', 'code', 'name', 'category_id', 'maker_id', 'country_id')->where('status', 1)->paginate(10);
            $category = [];
            $country = [];
            $maker = [];
            $data_product_type = [];
            foreach ($product_types as $product_type) {
                $category = Category::select('name')->where('id', $product_type->category_id)->first();
                $country = Country::select('name')->where('id', $product_type->country_id)->first();
                $maker = Maker::select('name')->where('id', $product_type->maker_id)->first();
                $data_product_type[] = [
                    'id' => $product_type->id,
                    'code' => $product_type->code,
                    'name' => $product_type->name,
                    'category' => $category->name,
                    'country' => $country->name,
                    'maker' => $maker->name,
                ];
            }
            return View('backend.product.index',
                compact('data_product_type', 'product_types')
            );
        } catch (Exception $e) {
            abort(404);
        }
    }

    public function create()
    {
    	$categories = Category::select('id', 'name')->get();
    	$countries = Country::select('id', 'name')->get();
    	$makers = Maker::select('id', 'name')->get();

    	return View('backend.product.add', 
    		compact('categories', 'countries', 'makers')
    	);
    }

    public function store(ProductTypeRequest $request)
    {
        $response = ProductType::store($request);
        if ($response) {
            return redirect()->route('backend.product.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.product.index')->with([
                'status' => false,
            ]);
        }
    	
    }

    public function edit($id)
    {
        if (!ProductType::find($id)) {
            abort(404);
        }
        try {
            $categories = Category::select('id', 'name')->get();
            $countries = Country::select('id', 'name')->get();
            $makers = Maker::select('id', 'name')->get();
            $product_type = ProductType::where('id', $id)->first();
            $images = ProductType::getImage($id, $type = 'all');
            return View('backend.product.edit', 
                compact('categories', 'countries', 'makers', 'product_type', 'images')
            );
        } catch (Exception $e) {
            abort(404);
        }
        
    }

    public function update(Request $request, $id)
    {
        # code...
    }

    public function destroy($id)
    {
        $response = ProductType::destroy($id);
        if ($response) {
            return redirect()->route('backend.product.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.product.index')->with([
                'status' => false,
            ]);
        }
    }
}
