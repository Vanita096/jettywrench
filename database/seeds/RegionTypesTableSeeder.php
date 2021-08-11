<?php

use Illuminate\Database\Seeder;

class RegionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region_types = [
            ['name' => 'continent'],
            ['name' => 'country'],

            ['name' => 'state'],
            ['name' => 'province'],

            ['name' => 'city'],
            ['name' => 'zip code'],
        ];

        DB::table('region_types')->insert($region_types);

    }
}
