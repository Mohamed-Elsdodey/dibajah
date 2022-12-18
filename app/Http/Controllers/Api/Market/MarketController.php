<?php

namespace App\Http\Controllers\Api\Market;

use App\Http\Controllers\Controller;
use App\Http\Resources\MarketResource;
use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function markets($id = false)
    {
        if ($id) {
            $data = MarketResource::make(Market::find($id));
        } else {
            $data = MarketResource::collection(Market::latest()->get());
        }
        return helperJson(['success' => true, 'data' => $data]);
    }
}//end class
