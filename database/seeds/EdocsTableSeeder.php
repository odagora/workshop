<?php

use Illuminate\Database\Seeder;

class EdocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $edoc = create('App\Edocs', [], 6);
    }
}
