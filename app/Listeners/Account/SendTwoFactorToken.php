<?php

namespace App\Listeners\Account;

use App\Events\Account\TwoFactorAuthenticationTokenRequested;
use App\TwoFactor\TwoFactor;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTwoFactorToken implements ShouldQueue
{
    protected $twofactor;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(TwoFactor $twofactor)
    {
        $this->twofactor = $twofactor;
    }

    /**
     * Handle the event.
     *
     * @param  TwoFactorAuthenticationRegistered  $event
     * @return void
     */
    public function handle(TwoFactorAuthenticationTokenRequested $event)
    {
        if (!$this->twofactor->sendToken($event->user)) {
            throw new \Exception('Failed to send verification token.');
        }
    }
}
