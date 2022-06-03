<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Pquote extends Model
{
    // use Multitenantable;
    protected $fillable = [
        'item_id',
        'unit_price',
        'item_qty',
        'discount',
        'cost_price',
        'item_total',
        'created_by',
        'change_price',
        'override_commission',
        'supplier_id',
    ];
    public function orders(){
        return $this->belongsToMany(Purchasing::class);
    }
}
