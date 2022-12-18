<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use JWTAuth;

class AuthUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'success'=>true,
            'access_token'=>$this->token,
            'token_type'=>'bearer',
            'expires_in'=>0,
            'user'=>[
                'id'=>$this->id,
                'first_name'=>$this->first_name,
                'last_name'=>$this->last_name,
                'email'=>$this->email,
                'phone'=>$this->phone,
                'image'=>$this->image,
                'status'=>$this->status,
                'created_at'=>$this->created_at,
                'updated_at'=>$this->updated_at,
                'image_full_link'=>get_file($this->image),
                'addresses'=>AddressesResource::collection($this->addresses)
            ]
        ];
    }
}
