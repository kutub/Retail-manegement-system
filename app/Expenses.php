<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Expenses extends Model
{
    // use Multitenantable;
    protected $fillable = ['date', 'total', 'tax', 'description', 'expense_head', 'account_head', 'receipient_name', 'approved_by', 'comments'];
}
