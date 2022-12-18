<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    public function getProducts(Request $request)
    {
        $rules = [
            'market_id' => 'required|exists:markets,id',
            'category_id' => ['nullable', 'exists:categories,id', Rule::exists('market_categories', 'category_id')
                ->where('market_id', $request->market_id)],
        ];
        $validator = Validator::make(\request()->all(), $rules);
        if ($validator->fails()) {
            return helperJson(['success' => false, 'message' => $validator->messages()->all()], 422);
        }
        $query = $request->only('market_id');
        if ($request->category_id != '') {
            $query['category_id'] = $request->category_id;
        }
        $data = Products::where($query)->latest()->get();
        return helperJson(['success' => true, 'data' => ProductResource::collection($data)]);
    }//end fun
}//end fun
