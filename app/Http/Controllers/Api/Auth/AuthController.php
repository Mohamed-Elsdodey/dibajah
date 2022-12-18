<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthUserResource;
use App\Http\Resources\UserResource;
use App\Http\Traits\Upload_Files;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JWTAuth;

class AuthController extends Controller
{
    use Upload_Files;

    public function login()
    {
        $rules = [
            'phone' => 'required',
        ];
        $validator = Validator::make(\request()->all(), $rules);
        if ($validator->fails()) {
            return helperJson(['success' => false, 'message' => $validator->messages()->all()], 422);
        }

        $rules = [
            'phone' => 'exists:users,phone',
        ];
        $validator = Validator::make(\request()->all(), $rules);
        if ($validator->fails()) {
            return helperJson(['error' => trans('auth.failed')], 401);
        }

        $data = $validator->validated();
        $user = User::where($data)->first();

        if (!$token = JWTAuth::fromUser($user)) {
            return helperJson(['error' => trans('auth.failed')], 401);
        }
        $user->token = $token;

        return helperJson(AuthUserResource::make($user));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function register(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|unique:users,phone',
            'email' => 'nullable|unique:users,email',
            'image' => 'nullable|image',
        ];
        $validator = Validator::make(\request()->all(), $rules);
        if ($validator->fails()) {
            return helperJson(['success' => false, 'message' => $validator->messages()->all()], 422);
        }
        $data = $validator->validated();

        if ($request->has('image')) {
            $data['image'] = $this->uploadFiles('users', $request->image);
        } else {
            $data['image'] = $this->storeDefaultImage('users', $request->first_name . ' ' . $request->last_name);
        }
        User::create($data);
        return helperJson(['success' => true, 'message' => trans('auth.Account has been successfully registered')]);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {
        $user = api()->user();
        return helperJson(UserResource::make($user));
    }//end fun

}//end class
