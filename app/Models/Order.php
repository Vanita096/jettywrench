<?php

namespace App\Models;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use ForTenants;

    protected $fillable = ['name'];
}
