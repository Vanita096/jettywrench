<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Tenant\TenantWasCreated' => [
            'App\Listeners\Tenant\CreateTenantDatabase',
        ],
        'App\Events\Tenant\TenantIdentified' => [
            'App\Listeners\Tenant\RegisterTenant',
        ],
        'App\Events\Tenant\TenantDatabaseCreated' => [
            'App\Listeners\Tenant\SetUpTenantDatabase',
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\Account\TwoFactorAuthenticationRegistered' => [
            'App\Listeners\Account\SendVerificationToken'
        ],
        'App\Events\Account\TwoFactorAuthenticationTokenRequested' => [
            'App\Listeners\Account\SendTwoFactorToken'
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
