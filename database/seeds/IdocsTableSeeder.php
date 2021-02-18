<?php

use Illuminate\Database\Seeder;

class IdocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idoc = create('App\Idocs', [], 6);
    }
}
