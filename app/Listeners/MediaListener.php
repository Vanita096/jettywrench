<?php

namespace App\Listeners;

use App\Events\Tenant\TenantIdentified;
use App\Models\Organization;
use Spatie\MediaLibrary\Events\ConversionWillStart;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class MediaListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    /**
     * Handle the event.
     *
     * @param  ConversionWillStart  $event
     * @return void
     */
    public function handle(ConversionWillStart $event)
    {
        $tenant = Organization::find(1);

        event(new TenantIdentified($tenant));

        Log::info('processing a conversion :' . $tenant->subdomain);
    }
}
