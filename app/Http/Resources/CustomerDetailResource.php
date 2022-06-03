<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerDetailResource extends JsonResource
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
        ];
    }
}
