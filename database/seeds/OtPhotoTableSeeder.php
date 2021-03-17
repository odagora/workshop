<?php

use Illuminate\Database\Seeder;

class OtPhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $otPhoto = create('App\Otphotos', [], 2);
    }
}
