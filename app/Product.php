<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Product extends Model
{
    // use Multitenantable;
    protected $table = 'items';
}
