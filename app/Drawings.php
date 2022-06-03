<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Drawings extends Model
{
    // use Multitenantable;
    public $guarded = [];
}
