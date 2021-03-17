<?php

use Illuminate\Database\Seeder;

class OtDtcTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $otDtc = create('App\Otdtc', [], 2);
    }
}
