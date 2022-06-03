<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Image extends Model
{
    // use Multitenantable;
    protected $fillable = ['image','items_id'];
    public function items(){
        return $this->belongsTo(Items::class);
    }
}
