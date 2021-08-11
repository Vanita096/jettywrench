<?php

namespace App\Console\Commands\Tenant;

use Illuminate\Database\Console\Seeds\SeedCommand;
use App\Tenant\Database\DatabaseManager;
use App\Tenant\Traits\Console\FetchesTenants;
use App\Tenant\Traits\Console\AcceptsMultipleTenants;
use Illuminate\Database\ConnectionResolverInterface as Resolver;

class Seed extends SeedCommand
{
    use FetchesTenants, AcceptsMultipleTenants;

    protected $db;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed tenant databases';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Resolver $resolver, DatabaseManager $db)
    {
        parent::__construct($resolver);
        $this->setName('tenants:seed');

        $this->specifyParameters();

        $this->db = $db;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->confirmToProceed()) {
            return;
        }

        $this->input->setOption('database', 'tenant');

        $this->tenants($this->option('tenants'))->each(function($tenant) {
            // create database connection
            $this->db->createConnection($tenant);

            // connect to the tenant
            $this->db->connectToTenant();

            $this->info('----------------------------------------------');
            $this->info('Tenant: ' . $tenant->uuid_text);

            parent::handle();

            // purge
            $this->db->purge();
        });

    }

}
