<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewOtDtcPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_view_otDtc_photos(){
        $otDtc = create('App\Otdtc');

        $this->get("app/otdocs/{$otDtc->id}/dtc")
            ->assertSee(($otDtc->image_name));

    }

    /**
     * @test
     */
    public function it_can_view_otdtc_photo_detail(){
        $otDtc = create('App\Otdtc');

        $this-> get("app/otdocs/{$otDtc->doc_id}/dtc/{$otDtc->id}")
            ->assertSee($otDtc->image_name);
    }
}
