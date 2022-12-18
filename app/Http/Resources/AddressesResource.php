<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressesResource extends JsonResource
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
            'id'=>$this->id,
            'user_id'=>$this->user_id,
            'street'=>$this->street,
            'country'=>CountryResource::make($this->country),
            'area'=>AreaResource::make($this->area),
            'city'=>CityResource::make($this->city),
            'apartment_num'=>$this->apartment_num,
            'region'=>$this->region,
            'postal_code'=>$this->postal_code,
            'phone'=>$this->phone,
            'default'=>$this->default?1:0
        ];
    }
}
