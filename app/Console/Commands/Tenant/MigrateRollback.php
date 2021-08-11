<?php

namespace App\Console\Commands\Tenant;

use App\Tenant\Database\DatabaseManager;
use App\Tenant\Traits\Console\FetchesTenants;
use App\Tenant\Traits\Console\AcceptsMultipleTenants;
use Illuminate\Database\Console\Migrations\MigrateCommand;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Database\Migrations\Migrator;

class MigrateRollback extends RollbackCommand
{
    use FetchesTenants, AcceptsMultipleTenants;

    protected $db;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback migrations for tenants';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Migrator $migrator, DatabaseManager $db)
    {
        parent::__construct($migrator);
        $this->setName('tenants:rollback');

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
            parent::handle();

            $this->info('----------------------------------------------');
            $this->info('Tenant: ' . $tenant->uuid_text);

            // purge
            $this->db->purge();
        });

    }

    protected function getMigrationPath()
    {
        return database_path('migrations/tenant');
    }
}
