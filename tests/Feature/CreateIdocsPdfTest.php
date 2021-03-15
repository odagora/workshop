<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateIdocsPdfTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_download_idocs_pdf(){
        $idoc = create('App\Idocs');

        $this->get("app/idocs/{$idoc->id}/pdf")
            ->assertSuccessful();
    }
}
