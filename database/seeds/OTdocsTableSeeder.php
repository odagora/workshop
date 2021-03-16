<?php

use Illuminate\Database\Seeder;

class OTdocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ot_docs = create('App\Otdocs', [], 6);
    }
}
