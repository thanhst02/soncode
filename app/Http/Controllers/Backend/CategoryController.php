<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
    	$category_paginate = Category::where('status', 1)->paginate(10);
    	$categories = [];
    	foreach ($category_paginate as $value) {
    		$categories[] = [
    			'id' => $value->id,
    			'name' => $value->name,
    			'description' => $value->description,
    		];
    	}
    	return view('backend.category.index',
    		compact('categories', 'category_paginate')
    	);
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(CategoryRequest $request)
    {
    	$response = Category::store($request);
        if ($response) {
            return redirect()->route('backend.category.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.category.index')->with([
                'status' => false,
            ]);
        }
    }

    public function edit($id)
    {
        if (!Category::find($id)) {
            abort(404);
        }
        $category = Category::where('id', $id)->first();
    	return view('backend.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
    	$response = Category::edit($request, $id);
        if ($response) {
            return redirect()->route('backend.category.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.category.index')->with([
                'status' => false,
            ]);
        }
    }

    public function destroy($id)
    {
        if (!Category::find($id)) {
            abort(404);
        }
        $response = Category::destroy($id);
        if ($response) {
            return redirect()->route('backend.category.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.category.index')->with([
                'status' => false,
            ]);
        }
    }
}
