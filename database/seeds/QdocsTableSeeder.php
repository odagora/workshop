<?php

use Illuminate\Database\Seeder;

class QdocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $qdoc = factory(App\Qdocs::class, 6)->create();
    }
}
