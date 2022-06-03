<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierDetailsResource extends JsonResource
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
            'name' => $this->name,
            'mobile' =>$this->phone,
            'email' =>$this->email,
            'address' =>$this->address,
            'city' =>$this->city,
            'country' =>$this->country,
            'type' =>$this->type,
            'balance' =>$this->opening_balance,
            'image' =>$this->image,
            'purchase' => $this->purchasing
        ];
    }
}
