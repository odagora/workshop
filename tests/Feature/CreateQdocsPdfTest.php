<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateQdocsPdfTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_download_qdocs_pdf(){
        $qdoc = create('App\Qdocs');

        $this->get("app/qdocs/{$qdoc->id}/pdf")
            ->assertSuccessful();
    }
}