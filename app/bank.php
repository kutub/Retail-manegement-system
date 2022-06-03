<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class bank extends Model
{
    // use Multitenantable;
    
    protected $guarded = [];
}
