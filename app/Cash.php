<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Cash extends Model
{
    // use Multitenantable;
    protected $guarded = [];
}
