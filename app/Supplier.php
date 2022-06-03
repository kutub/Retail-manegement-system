<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Supplier extends Model
{
    // use Multitenantable;
    protected $fillable = [
        'name', 'type', 'email', 'phone', 'city', 'country', 'account_no', 'address', 'opening_balance',
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function items(){
        return $this->hasMany(Items::class);
    }

    public function purchasing(){
        return $this->hasMany(Purchasing::class);
    }
}
