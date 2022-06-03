<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;
class Attribute extends Model
{
    // use Multitenantable;
    protected $fillable = ['name', 'attribute', 'created_by', 'updated_by'];

    public function items(){
        return $this->belongsToMany(Items::class)->withTimestamps();
    }
}
