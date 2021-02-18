<?php

use Illuminate\Database\Seeder;

class CdocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cdoc = create('App\Cdocs', [] , 6);
    }
}
