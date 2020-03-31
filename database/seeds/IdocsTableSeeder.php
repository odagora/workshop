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
        $qdoc = factory(App\Idocs::class, 6)->create();
    }
}
