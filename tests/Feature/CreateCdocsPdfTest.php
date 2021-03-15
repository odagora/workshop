<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PDF;

class CreateCdocsPdfTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_download_cdocs_pdf(){
        //Create Cdoc document
        $cdoc = create('App\Cdocs');

        //Make the assertion on pdf route
        $this->get("app/cdocs/{$cdoc->id}/pdf")
            ->assertSuccessful();
    }
}