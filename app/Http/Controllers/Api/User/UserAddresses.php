<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressesResource;
use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserAddresses extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Addresses::where('user_id',api()->id())->latest()->get();
        return helperJson(['success'=>true, 'data'=>AddressesResource::collection($data)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'street' => 'required',
            'country' => 'required',
            'area' => 'required',
            'city' => 'required',
            'apartment_num' => 'nullable',
            'region' => 'nullable',
            'postal_code' => 'nullable',
            'phone' => 'required',
            'default' => 'nullable',
        ];
        $validator = Validator::make(\request()->all(), $rules);
        if ($validator->fails()) {
            return helperJson($validator->messages(), 422);
        }

        $data = $validator->validated();
        unset($data['country']);
        unset($data['area']);
        unset($data['city']);
        $data['country_id'] = $request->country;
        $data['area_id'] = $request->area;
        $data['city_id'] = $request->city;
        $data['user_id'] = api()->id();
        $store = Addresses::create($data);
        return helperJson(['success'=>true, 'data'=>AddressesResource::make(Addresses::find($store->id))]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Addresses::findOrFail($id);
        return helperJson(['success'=>true, 'data'=>AddressesResource::make($data)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'street' => 'required',
            'country' => 'required',
            'area' => 'required',
            'city' => 'required',
            'apartment_num' => 'nullable',
            'region' => 'nullable',
            'postal_code' => 'nullable',
            'phone' => 'required',
            'default' => 'nullable',
        ];
        $validator = Validator::make(\request()->all(), $rules);
        if ($validator->fails()) {
            return helperJson($validator->messages(), 422);
        }

        $data = $validator->validated();
        unset($data['country']);
        unset($data['area']);
        unset($data['city']);
        $data['country_id'] = $request->country;
        $data['area_id'] = $request->area;
        $data['city_id'] = $request->city;
        $data['user_id'] = api()->id();
        Addresses::findOrFail($id)->update($data);
        return helperJson(['success'=>true, 'data'=>AddressesResource::make(Addresses::find($id))]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Addresses::findOrFail($id)->delete();
        return helperJson(['success'=>true,'message'=>trans('api.Address Has been deleted Successfully')]);
    }
}
