<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Quote extends Model
{
    // use Multitenantable;
    protected $guarded = [];

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function item(){
        return $this->belongsTo(Items::class);
    }
}
