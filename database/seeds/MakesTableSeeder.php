<?php

use Illuminate\Database\Seeder;

class MakesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('makes')->delete();
        
        \DB::table('makes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Alfa Romeo',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Aston Martin',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Audi',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Bmw',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Chana',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Chery',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Chevrolet',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Chrysler',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Citroen',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Dacia',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Daewoo',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Daihatsu',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Dfm',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Dodge',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Fiat',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Ford',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Foton',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Gmc',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Great Wall',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Hafei',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Honda',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Hummer',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Hyundai',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'International',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Isuzu',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Iveco',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Iveco-Pegaso',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Jac',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Jaguar',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Jbc',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Jcb',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Jeep',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Kia',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Komatsu',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'Lada',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'Lancia',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'Land Rover',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'Lexus',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'Mahindra',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'Mazda',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'Mercedes Benz',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'Mercury',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'Mg',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'Mini',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'Mitsubishi',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'Mitsubishi Fuso',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'Nissan',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'Opel',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            48 => 
            array (
                'id' => 49,
                'name' => 'Peugeot',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            49 => 
            array (
                'id' => 50,
                'name' => 'Renault',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            50 => 
            array (
                'id' => 51,
                'name' => 'Rolls-Royce',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            51 => 
            array (
                'id' => 52,
                'name' => 'Rover',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            52 => 
            array (
                'id' => 53,
                'name' => 'Saab',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            53 => 
            array (
                'id' => 54,
                'name' => 'Saic Chery',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            54 => 
            array (
                'id' => 55,
                'name' => 'Seat',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            55 => 
            array (
                'id' => 56,
                'name' => 'Skoda',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            56 => 
            array (
                'id' => 57,
                'name' => 'Smart',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            57 => 
            array (
                'id' => 58,
                'name' => 'Ssang Yong',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            58 => 
            array (
                'id' => 59,
                'name' => 'Subaru',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            59 => 
            array (
                'id' => 60,
                'name' => 'Suzuki',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            60 => 
            array (
                'id' => 61,
                'name' => 'Toyota',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            61 => 
            array (
                'id' => 62,
                'name' => 'Volkswagen',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            62 => 
            array (
                'id' => 63,
                'name' => 'Volvo',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            63 => 
            array (
                'id' => 64,
                'name' => 'Wuling',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            64 => 
            array (
                'id' => 65,
                'name' => 'Zongshen',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
            65 => 
            array (
                'id' => 66,
                'name' => 'Zotye',
                'created_at' => '2017-09-06 18:28:23',
                'updated_at' => '2017-09-06 18:28:23',
            ),
        ));
        
        
    }
}