<?php

namespace App\Tenant;

use App\Tenant\Models\Tenant;

class Manager
{
    protected $tenant;

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function getTenant()
    {
        return $this->tenant;
    }

    public function isTenant($uuid)
    {
        return $this->tenant->uuid == $uuid;
    }
}