<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $products = [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'dateTime' => $this->date_time,
            'basedImage' => isset($this->based_image)?$this->based_image:null,
            'images' => isset($this->images)?$this->images:null,
            'createdAt' => isset($this->created_at)?$this->created_at->toIso8601String():null,
            'updatedAt' => isset($this->updated_at)?$this->updated_at->toIso8601String():null
        ];

        return array_filter($products);
    }
}
