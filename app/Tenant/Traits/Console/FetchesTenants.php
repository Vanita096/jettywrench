<?php

namespace App\Tenant\Traits\Console;

use App\Models\Organization;

trait FetchesTenants
{
    public function tenants($ids = null)
    {
        $tenants = Organization::query();

        if ($ids) {
            $tenants = $tenants->whereIn('id', $ids);
        }

        return $tenants;
    }
}