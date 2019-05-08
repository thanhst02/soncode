<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\CountryRequest;

class CountryController extends Controller
{
    public function index()
    {
    	$country_paginate = Country::where('status', 1)->paginate(10);
    	$countries = [];
    	foreach ($country_paginate as $value) {
    		$countries[] = [
    			'id' => $value->id,
    			'name' => $value->name,
    			'iso_code' => $value->iso_code,
                'country_code' => $value->country_code
    		];
    	}
    	return view('backend.country.index',
    		compact('countries', 'country_paginate')
    	);
    }

    public function create()
    {
        return view('backend.country.create');
    }

    public function store(CountryRequest $request)
    {
    	$response = Country::store($request);
        if ($response) {
            return redirect()->route('backend.country.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.country.index')->with([
                'status' => false,
            ]);
        }
    }

    public function edit($id)
    {
        if (!Country::find($id)) {
            abort(404);
        }
        $country = Country::where('id', $id)->first();
    	return view('backend.country.edit', compact('country'));
    }

    public function update(CountryRequest $request, $id)
    {
    	$response = Country::edit($request, $id);
        if ($response) {
            return redirect()->route('backend.country.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.country.index')->with([
                'status' => false,
            ]);
        }
    }
    public function destroy($id)
    {
        $response = Country::destroy($id);
        if ($response) {
            return redirect()->route('backend.country.index')->with([
                'status' => true,
            ]);
        }else{
            return redirect()->route('backend.country.index')->with([
                'status' => false,
            ]);
        }
    }
}
