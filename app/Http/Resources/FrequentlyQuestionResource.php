<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FrequentlyQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title_ar' => $this->title_ar,
            'desc_ar' => $this->desc_ar,
            'title_en' => $this->title_en,
            'desc_en' => $this->desc_en,
        ];
    }
}
