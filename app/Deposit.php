<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Deposit extends Model
{
    // use Multitenantable;
    public $guarded = [];
}
