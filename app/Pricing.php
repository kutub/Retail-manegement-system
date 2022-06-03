<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Pricing extends Model
{
    // use Multitenantable;
    protected $fillable = [
        'items_id',
        'cost_price',
        'selling_price',
        'promo_price',
        'start',
        'end',
        'include_tax',
        'change_price',
        'override_commission',
        'override_tax',
        'created_by',
        'updated_by'
    ];

public function items(){
    return $this->belongsTo(Items::class);
}
}
