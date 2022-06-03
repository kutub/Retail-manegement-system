<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EditItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'generic' => $this->generic,
            'category_id' => $this->category_id,
            'supplier_id' => $this->supplier_id,
            'upc_ean_isbn' => $this->upc_ean_isbn,
            'product_id' => $this->product_id,
            'additional_item_no' => $this->additional_item_no,
            'tags' => $this->tags,
            'manufacturer' => $this->manufacturer,
            'description' => $this->description,
            'is_service' => $this->is_service,
            'allow_alt_description' => $this->allow_alt_description,
            'item_has_serial_number' => $this->item_has_serial_number,
            'disable_loyalty' => $this->disable_loyalty,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'brand' => $this->brand,
            'year' => $this->year,
            'parts_no' => $this->parts_no,
            'created_at' => $this->updated_by,
            'updated_at' => $this->updated_at,
            // 'attribute' => $this->attribute,
            'quantity' => $this->inventory,
            'price' => $this->pricing,
            'image' => $this->image,
            'location' => $this->location,
        ];
    }
}
