<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Order extends Model
{
    // use Multitenantable;
    protected $fillable = [
        
        'sub_total', 
        'customer_id', 
        'total', 
        'due', 
        'payment_type', 
        'vat',
        'currency', 
        'payment_total', 
        'comments', 
        'show_comment', 
        'change_date',
        'include_transport', 
        'modified_date',
        'transport_cost', 
        'total_profit', 
        'created_by', 
        'discount', 
        'discount_reason', 
        'status',
    ];

    public function quotes(){
        return $this->belongsToMany(Quote::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
