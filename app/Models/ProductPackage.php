<?php

namespace App\Models;

use App\Tenant\Traits\ForTenants;
use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    use ForTenants;

    protected $fillable = ['quantity', 'amount'];

    public function getTotalAttribute()
    {
        return $this->quantity * $this->amount;
    }
}
