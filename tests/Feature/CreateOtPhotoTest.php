<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateOtPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_upload_otPhotos(){
        $otPhoto = create('App\Otphotos');

        $this->withExceptionHandling()
            ->post("app/otdocs/upload/images/{$otPhoto->ic}", $otPhoto->toArray());

        $this->assertEquals(1, \App\Otphotos::all()->count());

        $this->withExceptionHandling()
            ->get("app/otdocs/{$otPhoto->id}/photo")
            ->assertSee($otPhoto->image_name);
    }
}