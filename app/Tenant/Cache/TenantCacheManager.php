<?php

namespace App\Tenant\Cache;

use App\Tenant\Manager;
use Illuminate\Cache\CacheManager;

class TenantCacheManager extends CacheManager
{
    public function __call($method, $parameters)
    {
        if ($this->getTenantCacheTag()) {
            if($method === 'tags') {
                return $this->store()->tags(
                    array_merge($this->getTenantCacheTag(), ...$parameters)
                );
            }

            return $this->store()->tags($this->getTenantCacheTag())->$method(...$parameters);

        } else {
            return $this->store()->$method(...$parameters);
        }
    }

    protected function getTenantCacheTag()
    {
        $tenant = $this->app[Manager::class]->getTenant();

        if($tenant){
            return ['tenant_' . $this->app[Manager::class]->getTenant()->uuid];
        } else {
            return false;
        }

    }
}