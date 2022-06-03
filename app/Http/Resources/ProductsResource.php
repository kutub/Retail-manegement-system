<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'generic' => $this->generic,
            'quantity' => new InventoryResource($this->inventory),
            'price' => new PricingResource($this->pricing),
            'image' => new ImageResource($this->image),
            'total' => 1,
        ];
    }
}
