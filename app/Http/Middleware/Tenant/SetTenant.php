<?php

namespace App\Http\Middleware\Tenant;

use App\Events\Tenant\TenantIdentified;
use App\Models\Organization;
use Closure;

class SetTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $tenant = $this->resolveTenant($request->workspace);

        event(new TenantIdentified($tenant));

        return $next($request);
    }

    protected function resolveTenant($workspace)
    {
        return Organization::where('subdomain', $workspace)->firstOrFail();
    }

}
