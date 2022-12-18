<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getCountries()
    {
        $data = Country::all();
        return helperJson(['success' => true, 'data' => CountryResource::collection($data)]);
    }//end fun
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAreas($id='All')
    {
        $data = Area::where(function ($query) use ($id) {
            if ($id != 'All')
                $query->where('country_id',$id);
        })->latest()->get();
        return helperJson(['success' => true, 'data' => AreaResource::collection($data)]);
    }//end fun
    public function getCities($id)
    {
        $data = City::where(function ($query) use ($id) {
            if ($id != 'All')
                $query->where('area_id',$id);
        })->latest()->get();
        return helperJson(['success' => true, 'data' => CityResource::collection($data)]);
    }//end fun
}//end class
