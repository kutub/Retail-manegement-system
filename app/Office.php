<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Office extends Model
{
    // use Multitenantable;
    protected $guarded = [];
}
