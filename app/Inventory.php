<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Inventory extends Model
{
    // use Multitenantable;
    protected $fillable = [
        'items_id',
        'reorder_level',
        'replenish_level',
        'expiration_date',
        'quantity',
        'inventory_add_subs',
        'comments',
        'created_by',
        'updated_by',
    ];
    public function items(){
        return $this->belongsTo(Items::class);
    }
}
