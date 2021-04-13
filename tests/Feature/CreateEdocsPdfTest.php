<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateEdocsPdfTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_download_edocs_pdf(){
        $edoc = create('App\Edocs');

        $this->withExceptionHandling()
            ->get("app/edocs/{$edoc->id}/pdf")
            ->assertSuccessful();
    }
}