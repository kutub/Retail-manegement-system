<?php

namespace App\Http\Resources;

use App\Customer;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceOrderResource extends JsonResource
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
            'customer' => new CustomerDetailResource(Customer::find($this->customer_id)),
            'sub_total' => $this->sub_total,
            'total' => $this->total,
            'payment_total' => $this->payment_total,
            'due' => $this->due,
            'vat' => $this->sub_total,
            'payment_total' => $this->payment_total,
            'comments' => $this->comments,
            'change_date' => $this->change_date,
            'modified_date' => $this->modified_date,
            'transport_cost' => $this->transport_cost,
            'discount' => $this->show_comment,
            'discount_reason' => $this->discount_reason,
            'quotes' => InvoiceQuotesResource::collection($this->quotes),
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d h:i:s'),
        ];
    }
}
