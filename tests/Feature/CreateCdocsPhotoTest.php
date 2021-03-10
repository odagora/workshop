<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateCdocsPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_upload_cdocs_photos(){
        //Create Cphoto
        $cphoto = create('App\Cphotos');

        $this->withExceptionHandling()
            ->post("app/cdocs/upload/images/{$cphoto->doc_id}", $cphoto->toArray());

        $this->assertEquals(1, \App\Cphotos::all()->count());

        $this->withExceptionHandling()
            ->get("app/cdocs/{$cphoto->doc_id}/photo")
            ->assertSee($cphoto->image_name);
    }
}