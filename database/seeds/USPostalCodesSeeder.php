<?php

use Illuminate\Database\Seeder;
use App\Models\RegionType;
use App\Models\Region;

class USPostalCodesSeeder extends Seeder
{

    protected $table;
    protected $filename;

    public function __construct()
    {
        $this->table = 'regions';
        $this->filename = database_path() . '/sources/postal_codes/US/united_states_zip_codes.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_array = $this->seedFromCSV($this->filename, ',');

        $zip_code_type_id = RegionType::where('name', '=', 'zip code')->first()->id;
        $city_type_id = RegionType::where('name', '=', 'city')->first()->id;

        foreach($seed_array as $item) {

            $row = array();

            $row['name'] = $item['zip_code'];
            $row['type_id'] = $zip_code_type_id;

            if($item['latitude'] == '') {
                $row['latitude'] = null;
                $row['longitude'] = null;
            } else {
                $row['latitude'] = $item['latitude'];
                $row['longitude'] = $item['longitude'];
            }

            // does this city exist?


            $state = Region::where('code', '=', $item['state_code'])->first();
            $city = Region::where('name', '=', $item['city'])->where('parent_id', '=', $state->id)->first();

            if(!$city) {
                // create the city leaf
                $city = new Region(['name' => $item['city'], 'type_id' => $city_type_id]);
                $city->appendToNode($state)->save();
            }

            $node = new Region($row);
            $node->appendToNode($city)->save();

        }
    }

    public function seedFromCSV($filename, $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = NULL;
        $data = array();

        if(($handle = fopen($filename, 'r')) !== FALSE) {
            while(($row = fgetcsv($handle, 100, $delimiter)) !== FALSE) {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
        }

        return collect($data);

    }
}
