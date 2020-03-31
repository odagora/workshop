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
        $edoc = factory(App\Edocs::class, 6)->create();
    }
}
