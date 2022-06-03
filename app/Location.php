<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Location extends Model
{
    // use Multitenantable;
    protected $fillable = [
        'at_store',
        'reorder_level',
        'replenish_level',
        'items_id',
        'override_prices',
        'override_tax',
        'created_by',
        'updated_by'
    ];
    public function items(){
        return $this->belongsTo(Items::class);
    }
}
