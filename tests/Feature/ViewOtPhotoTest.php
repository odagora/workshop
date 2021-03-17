<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewOtPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_view_otPhotos(){
        $otPhoto = create('App\Otphotos');

        $this->get("app/otdocs/{$otPhoto->id}/photo")
            ->assertSee($otPhoto->image_name);
    }
}