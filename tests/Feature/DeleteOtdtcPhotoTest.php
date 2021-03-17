<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteOtdtcPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_otdtc_photos(){
        $otDtc = create('App\Otdtc');

        $this->withExceptionHandling()
            ->delete("app/otdocs/{$otDtc->doc_id}/dtc/{$otDtc->id}");

        $this->get("app/otdocs/{$otDtc->id}/dtc")
            ->assertDontSee($otDtc->image_name);
    }
}
