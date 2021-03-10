<?php

use Illuminate\Database\Seeder;

class CdocsPhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cphoto = create('App\Cphotos', [], 1);
    }
}
