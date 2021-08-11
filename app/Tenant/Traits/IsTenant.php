<?php

namespace App\Tenant\Traits;

use App\Models\TenantConnection;
use App\Tenant\Models\Tenant;
use Webpatser\Uuid\Uuid;

trait IsTenant
{

    public static function boot()
    {
        parent::boot();

        static::creating(function ($tenant) {
            $tenant->uuid = Uuid::generate(4);
        });

        static::created(function ($tenant) {
            $tenant->tenantConnection()->save(new TenantConnection([
                'database' => 'jw_' . $tenant->uuid
            ]));
        });
    }

    protected static function newDatabaseConnection(Tenant $tenant)
    {
        return new TenantConnection([
            'database' => 'jw_' . $tenant->uuid
        ]);
    }

    public function tenantConnection()
    {
        return $this->hasOne(TenantConnection::class);
    }
}