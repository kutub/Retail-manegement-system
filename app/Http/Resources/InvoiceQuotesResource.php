<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceQuotesResource extends JsonResource
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
            'unit_price' => $this->unit_price,
            'item_qty' => $this->item_qty,
            'discount' => $this->discount,
            'item_total' => $this->item_total,
            'item' => new QuotesItemDetailResource($this->item),
        ];
    }
}
