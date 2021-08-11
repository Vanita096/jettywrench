<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['code' => 'US', 'name' => 'United States of America', 'dial_code' => '+1', 'continent_id' => '5'],
            ['code' => 'CA', 'name' => 'Canada', 'dial_code' => '+1', 'continent_id' => '5'],
            ['code' => 'MX', 'name' => 'Mexico', 'dial_code' => '+52', 'continent_id' => '5'],
            ['code' => 'PL', 'name' => 'Poland', 'dial_code' => '+48', 'continent_id' => '4'],
        ];

        DB::table('countries')->insert($countries);

    }
}
