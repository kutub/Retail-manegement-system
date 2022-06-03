<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Receive extends Model
{
    // use Multitenantable;
    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
