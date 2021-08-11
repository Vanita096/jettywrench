<?php

namespace App\Models;

use App\Models\Traits\HasPrice;
use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use ForTenants, HasPrice;

    protected $fillable = [
        'name',
        'price',
        'unit'
    ];
}





