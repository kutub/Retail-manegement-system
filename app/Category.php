<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Category extends Model
{
    // use Multitenantable;
    protected $fillable = [ 'supplier_id', 'name' ];

    public function items(){
        return $this->hasMany(Items::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
