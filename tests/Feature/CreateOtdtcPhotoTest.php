<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateOtdtcPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_upload_otDtc_photos(){
        $otDtc = create('App\Otdtc');

        $this->withExceptionHandling()
            ->post("app/otdocs/upload/dtc/{$otDtc->id}", $otDtc->toArray());

        $this->assertEquals(1, \App\Otdtc::all()->count());

        $this->withExceptionHandling()
            ->get("app/otdocs/{$otDtc->id}/dtc")
            ->assertSee($otDtc->image_name);
    }
}
