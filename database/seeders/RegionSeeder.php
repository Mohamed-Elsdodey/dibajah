<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = file_get_contents(public_path('json-files/regions.json'));
        $cities = file_get_contents(public_path('json-files/cities.json'));

        $regions = json_decode($regions);
        $cities = json_decode($cities);
        City::where('id','!=',0)->delete();
        Region::where('id','!=',0)->delete();
        foreach ($regions as $region)
        {
            $regionData = [];
            $regionData['name_ar'] = $region->name_ar;
            $regionData['name_en'] = $region->name_en;
            $regionData['code'] = $region->code;
            $regionData['id'] = $region->region_id;
            Region::create($regionData);
        }
        foreach ($cities as $city)
        {
            $cityData = [];
            $cityData['name_ar'] = $city->name_ar;
            $cityData['name_en'] = $city->name_en;
            $cityData['region_id'] = $city->region_id;
            $cityData['id'] = $city->city_id;
            City::create($city);
        }

    }
}
