<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Customer extends Model
{
    // use Multitenantable;
    
    protected $fillable = [

        'first_name',
        'last_name',
        'mobile',
        'email',
        'image',
        'status',
        'city',
        'state',
        'country',
        'zip',
        'address_1',
        'address_2',
        'comments',
        'balance',
        'credit_limit',
        'account',
        'bkash_number',
        'amount_for_next_point',
        'test',
        'tier_name',
        'percentage',
        'points',
        'disable_loyalty',
        'override_tax',
        'taxable' => 1,
        'non_tax_certificate_no',
        'created_by_user_id'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function payments(){
        return $this->hasMany(Receive::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'created_by_user_id');
    }
}
