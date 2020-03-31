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
        $qdoc = factory(App\Cdocs::class, 6)->create();
    }
}
