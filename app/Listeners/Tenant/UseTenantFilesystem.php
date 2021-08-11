<?php

namespace App\Listeners\Tenant;

use App\Events\Tenant\TenantIdentified;
use App\Tenant\Models\Tenant;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UseTenantFilesystem
{
    protected $filesystem;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(FilesystemManager $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * Handle the event.
     *
     * @param  TenantIdentified  $event
     * @return void
     */
    public function handle(TenantIdentified $event)
    {
        $this->filesystem->set('tenant', $this->createDriver($this->getFilesystemConfig($event->tenant)));
    }

    protected function createDriver($config)
    {
        return $this->filesystem->createLocalDriver($config);
    }

    protected function getFilesystemConfig(Tenant $tenant)
    {
        $config = config('filesystems.disks.' . config('filesystems.default'));

        $config['root'] = storage_path('app/' . $tenant->uuid);

        return $config;
    }
}
