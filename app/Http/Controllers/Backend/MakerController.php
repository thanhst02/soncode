<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Maker;
use App\Http\Requests\MakerRequest;
use App\Models\Address;

class MakerController extends Controller
{
    public function index()
    {
    	$maker_paginate = Maker::where('status', 1)->paginate(10);
    	$makers = [];
    	foreach ($maker_paginate as $value) {
    		$address = Address::where('id', $value->address_id)->where('status', 1)->first();
    		$makers[] = [
    			'id' => $value->id,
    			'name' => $value->name,
    			'description' => $value->description,
    		];
    	}
    	return view('backend.maker.index',
    		compact('makers', 'maker_paginate')
    	);
    }

    public function create()
    {
        return view('backend.maker.create');
    }

    public function store(Request $request)
    {
    	$response = Maker::store($request);
        if ($response) {
            return redirect()->route('backend.maker.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.maker.index')->with([
                'status' => false,
            ]);
        }
    }

    public function edit($id)
    {
        if (!Maker::find($id)) {
            abort(404);
        }
        $maker = Maker::where('id', $id)->first();
    	return view('backend.maker.edit', compact('maker'));
    }

    public function update(Request $request, $id)
    {
    	$response = Maker::edit($request, $id);
        if ($response) {
            return redirect()->route('backend.maker.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.maker.index')->with([
                'status' => false,
            ]);
        }
    }

    public function destroy($id)
    {
        $response = Maker::destroy($id);
        if ($response) {
            return redirect()->route('backend.maker.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.maker.index')->with([
                'status' => false,
            ]);
        }
    }
}
