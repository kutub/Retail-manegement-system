<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FindCustomerResource extends JsonResource
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
            'id' =>$this->id,
            'name' => $this->first_name.' '.$this->last_name,
            'mobile' =>$this->mobile,
            'email' =>$this->email,
            'address_1' =>$this->address_1,
            'address_2' =>$this->address_2,
            'city' =>$this->city,
            'state' =>$this->state,
            'country' =>$this->country,
            'zip' =>$this->zip,
            'balance' =>$this->balance,
            'image' =>$this->image,
            'status' =>$this->status,
            'comments' => $this->comments,
            'credit_limit' =>$this->credit_limit,
            'disable_loyalty' =>$this->disable_loyalty,
            'amount_for_next_point' =>$this->amount_for_next_point,
            'points' =>$this->points,
            'company_name' =>$this->company_name,
            'account' =>$this->account,
            'override_tax' =>$this->override_tax,
            'taxable' =>$this->taxable,
            'non_tax_certificate_no' =>$this->non_tax_certificate_no,
            'bkash_number' =>$this->bkash_number,
            'test' =>$this->test,
            'percentage' =>$this->percentage,
            'tier_name' =>$this->tier_name,
            'created_at' => $this->updated_by,
            'updated_at' => $this->updated_at,

            'orders' => $this->orders,
            'payments' => $this->payments
        ];
    }
}
