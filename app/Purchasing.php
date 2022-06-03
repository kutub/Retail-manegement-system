<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Purchasing extends Model
{
    // use Multitenantable;
    protected $fillable = [
        'items_id',
        'category_id',
        'supplier_id',
        'cost_price',
        'quantity',
        'trasport',
        'total',
        'payments',
        'due',
        'notes',
        'created_by'
    ];

    public function pquotes(){
        return $this->belongsToMany(Pquote::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
