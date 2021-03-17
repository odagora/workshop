<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteOtPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_OtPhotos(){
        $otPhoto = create('App\Otphotos');

        $this->withExceptionHandling()
        ->delete("app/otdocs/{$otPhoto->doc_id}/photo/{$otPhoto->id}");

        $this->get("app/otdocs/{$otPhoto->id}/photo")
            ->AssertDontSee($otPhoto->image_name);
    }
}