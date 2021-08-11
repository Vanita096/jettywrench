<?php

use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // tenant-specific
        Bouncer::allow('admin')->to([
            'access-admin-pages',
            'create-tenants',

            'create-orders',

            'create-products',
            'update-products',
            'create-product-packages',

            'create-product-variations',
            'update-product-variations',
            'add-ingredients-to-product-variations',

            'create-ingredients',
            'update-ingredients',



        ]);

        // non-tenant-specific
        Bouncer::allow('client')->to([
            'create-tenants',
            'create-orders',
            'update-profile',
        ]);
    }
}
