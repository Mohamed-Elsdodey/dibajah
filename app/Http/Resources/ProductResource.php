<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'stock'=>$this->stock,
            'status'=>$this->status,
            'back_order'=>intval($this->back_order),
            'featured'=>intval($this->featured),
            'main_image'=>get_file($this->main_image),
            'shipping'=>$this->shipping,
            'weight'=>$this->weight,
            'length'=>$this->length,
            'width'=>$this->width,
            'height'=>$this->height,
        ];
    }
}
