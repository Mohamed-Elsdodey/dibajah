<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $images = [];
        foreach (json_decode($this->images, true) as $image) {
            $images[] = get_file($image);
        }

        return [
            'id' => $this->id,
            'service_id' => $this->service_id,
            'service' => ServicesResource::make($this->service),
            'user_id' => $this->user_id,
            'user' => UserResource::make($this->user),
            'vendor_id' => $this->vendor_id,
            'vendor' => UserResource::make($this->vendor),
            'status' => $this->status,
            'text' => $this->text,
            'file' => $this->file?get_file($this->file):null,
            'payment_type' => $this->payment_type,
            'payment_status' => $this->payment_status,
            'final_total_price' => $this->final_total_price,
            'tax' => $this->tax,
            'final_cost' => $this->final_cost,
            'order_closing_symbol' => $this->order_closing_symbol,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'date' => date('Y-m-d', strtotime($this->created_at)),
            'time' => date('h:i A', strtotime($this->created_at)),
            'images' => $images
        ];
    }
}
