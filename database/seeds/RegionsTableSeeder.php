<?php

use Illuminate\Database\Seeder;
use App\Models\RegionType;
use App\Models\Region;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        /*
         *
         * Continents table
         *  -> Countries table with continent_id column
         *      -> Regions table where parent is the
         *
         */

        $regions = [
            ['name' => 'Continents',
                'children' => [
                    ['code' => 'AF', 'name' => 'Africa'],
                    ['code' => 'AN', 'name' => 'Antarctica'],
                    ['code' => 'AS', 'name' => 'Asia'],

                    // Europe
                    ['code' => 'EU', 'name' => 'Europe',
                        'children' => [
                            ['name' => 'Countries',
                                'children' => [
                                    ['code' => 'PL', 'name' => 'Poland'],
                                    ['code' => 'IT', 'name' => 'Italy'],
                                    ['code' => 'FR', 'name' => 'France']
                                ]
                            ],
                        ]
                    ],

                    // North America
                    ['code' => 'NA', 'name' => 'North America',
                        'children' => [
                            ['name' => 'Countries',
                                'children' => [
                                    ['code' => 'US', 'name' => 'United States of America',
                                        'children' => [
                                            ['name' => 'States',
                                                'children' => [
                                                    ['name' => 'Alabama', 'code' => 'AL'],
                                                    ['name' => 'Alaska', 'code' => 'AK'],
                                                    ['name' => 'Arizona', 'code' => 'AZ'],
                                                    ['name' => 'Arkansas', 'code' => 'AR'],
                                                    ['name' => 'California', 'code' => 'CA'],
                                                    ['name' => 'Colorado', 'code' => 'CO'],
                                                    ['name' => 'Connecticut', 'code' => 'CT'],
                                                    ['name' => 'Delaware', 'code' => 'DE'],
                                                    ['name' => 'District of Columbia', 'code' => 'DC'],
                                                    ['name' => 'Florida', 'code' => 'FL'],
                                                    ['name' => 'Georgia', 'code' => 'GA'],
                                                    ['name' => 'Hawaii', 'code' => 'HI'],
                                                    ['name' => 'Idaho', 'code' => 'ID'],
                                                    ['name' => 'Illinois', 'code' => 'IL'],
                                                    ['name' => 'Indiana', 'code' => 'IN'],
                                                    ['name' => 'Iowa', 'code' => 'IA'],
                                                    ['name' => 'Kansas', 'code' => 'KS'],
                                                    ['name' => 'Kentucky', 'code' => 'KY'],
                                                    ['name' => 'Louisiana', 'code' => 'LA'],
                                                    ['name' => 'Maine', 'code' => 'ME'],
                                                    ['name' => 'Maryland', 'code' => 'MD'],
                                                    ['name' => 'Massachusetts', 'code' => 'MA'],
                                                    ['name' => 'Michigan', 'code' => 'MI'],
                                                    ['name' => 'Minnesota', 'code' => 'MN'],
                                                    ['name' => 'Mississippi', 'code' => 'MS'],
                                                    ['name' => 'Missouri', 'code' => 'MO'],
                                                    ['name' => 'Montana', 'code' => 'MT'],
                                                    ['name' => 'Nebraska', 'code' => 'NE'],
                                                    ['name' => 'Nevada', 'code' => 'NV'],
                                                    ['name' => 'New Hampshire', 'code' => 'NH'],
                                                    ['name' => 'New Jersey', 'code' => 'NJ'],
                                                    ['name' => 'New Mexico', 'code' => 'NM'],
                                                    ['name' => 'New York', 'code' => 'NY'],
                                                    ['name' => 'North Carolina', 'code' => 'NC'],
                                                    ['name' => 'North Dakota', 'code' => 'ND'],
                                                    ['name' => 'Ohio', 'code' => 'OH'],
                                                    ['name' => 'Oklahoma', 'code' => 'OK'],
                                                    ['name' => 'Oregon', 'code' => 'OR'],
                                                    ['name' => 'Pennsylvania', 'code' => 'PA'],
                                                    ['name' => 'Rhode Island', 'code' => 'RI'],
                                                    ['name' => 'South Dakota', 'code' => 'SD'],
                                                    ['name' => 'Tennessee', 'code' => 'TN'],
                                                    ['name' => 'Texas', 'code' => 'TX'],
                                                    ['name' => 'Utah', 'code' => 'UT'],
                                                    ['name' => 'Vermont', 'code' => 'VT'],
                                                    ['name' => 'Virginia', 'code' => 'VA'],
                                                    ['name' => 'Washington', 'code' => 'WA'],
                                                    ['name' => 'West Virginia', 'code' => 'WV'],
                                                    ['name' => 'Wisconsin', 'code' => 'WI'],
                                                    ['name' => 'Wyoming', 'code' => 'WY'],
                                                    ['name' => 'Puerto Rico', 'code' => 'PR'],
                                                    ['name' => 'Virgin Islands', 'code' => 'VI'],
                                                    ['name' => 'South Carolina', 'code' => 'SC'],
                                                    ['name' => 'American Samoa', 'code' => 'AS'],
                                                    ['name' => 'Guam', 'code' => 'GU'],
                                                    ['name' => 'Palau', 'code' => 'PW'],
                                                    ['name' => 'Federated States Of Micro', 'code' => 'FM'],
                                                    ['name' => 'Northern Mariana Islands', 'code' => 'MP'],
                                                    ['name' => 'Marshall Islands', 'code' => 'MH'],
                                                ]
                                            ],
                                        ]
                                    ],
                                    ['name' => 'Canada', 'code' => 'CA',
                                        'children' => [
                                            ['name' => 'Provinces',
                                                'children' => [
                                                    ['name' => 'Alberta', 'code' => 'AB'],
                                                    ['name' => 'British Columbia', 'code' => 'BC'],
                                                    ['name' => 'Manitoba', 'code' => 'MB'],
                                                    ['name' => 'New Brunswick', 'code' => 'NB'],
                                                    ['name' => 'Newfoundland and Labrador', 'code' => 'NL'],
                                                    ['name' => 'Northwest Territories', 'code' => 'NT'],
                                                    ['name' => 'Nova Scotia', 'code' => 'NS'],
                                                    ['name' => 'Nunavut', 'code' => 'NU'],
                                                    ['name' => 'Ontario', 'code' => 'ON'],
                                                    ['name' => 'Prince Edward Island', 'code' => 'PE'],
                                                    ['name' => 'Quebec', 'code' => 'QC'],
                                                    ['name' => 'Saskatchewan', 'code' => 'SK'],
                                                    ['name' => 'Yukon Territory', 'code' => 'YT'],
                                                ]
                                            ]
                                        ]
                                    ],
                                    ['name' => 'Mexico', 'code' => 'MX',
                                        'children' => [
                                            ['name' => 'States',
                                                'children' => [
                                                    ['name' => 'Aguascalientes', 'code' => 'AG'],
                                                    ['name' => 'Baja California', 'code' => 'BC'],
                                                    ['name' => 'Baja California Sur', 'code' => 'BS'],
                                                    ['name' => 'Chihuahua', 'code' => 'CH'],
                                                    ['name' => 'Colima', 'code' => 'CL'],
                                                    ['name' => 'Campeche', 'code' => 'CM'],
                                                    ['name' => 'Coahuila', 'code' => 'CO'],
                                                    ['name' => 'Chiapas', 'code' => 'CS'],
                                                    ['name' => 'Federal District', 'code' => 'DF'],
                                                    ['name' => 'Durango', 'code' => 'DG'],
                                                    ['name' => 'Guerrero', 'code' => 'GR'],
                                                    ['name' => 'Guanajuato', 'code' => 'GI'],
                                                    ['name' => 'Hidalgo', 'code' => 'HG'],
                                                    ['name' => 'Jalisco', 'code' => 'JA'],
                                                    ['name' => 'México State', 'code' => 'ME'],
                                                    ['name' => 'Michoacán', 'code' => 'MI'],
                                                    ['name' => 'Morelos', 'code' => 'MO'],
                                                    ['name' => 'Nayarit', 'code' => 'NA'],
                                                    ['name' => 'Nuevo León', 'code' => 'NL'],
                                                    ['name' => 'Oaxaca', 'code' => 'OA'],
                                                    ['name' => 'Puebla', 'code' => 'PB'],
                                                    ['name' => 'Querétaro', 'code' => 'QE'],
                                                    ['name' => 'Quintana Roo', 'code' => 'QR'],
                                                    ['name' => 'Sinaloa', 'code' => 'SI'],
                                                    ['name' => 'San Luis Potosí', 'code' => 'SL'],
                                                    ['name' => 'Sonora', 'code' => 'SO'],
                                                    ['name' => 'Tabasco', 'code' => 'TB'],
                                                    ['name' => 'Tlaxcala', 'code' => 'TL'],
                                                    ['name' => 'Tamaulipas', 'code' => 'TM'],
                                                    ['name' => 'Veracruz', 'code' => 'VE'],
                                                    ['name' => 'Yucatán', 'code' => 'YU'],
                                                    ['name' => 'Zacatecas', 'code' => 'ZA'],
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                        ],
                    ],

                    // Oceana
                    ['code' => 'OC', 'name' => 'Oceania'],

                    // South America
                    ['code' => 'SA', 'name' => 'South America'],
                ]
            ]
        ];

        foreach($regions as $region) {
            Region::create($region);
        }

    }
}
