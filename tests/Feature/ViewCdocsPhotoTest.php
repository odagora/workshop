<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewCdocsPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_view_cdocs_photos(){
        $cphoto = create('App\Cphotos');

        $this->get("app/cdocs/{$cphoto->doc_id}/photo")
            ->assertSee($cphoto->image_name);
    }

    /**
     * @test
     */
    public function it_can_view_cdocs_photo_detail(){
        $cphoto = create('App\Cphotos');

        $this->get("app/cdocs/{$cphoto->doc_id}/photo/{$cphoto->id}")
            ->assertSee($cphoto->image_name);
    }
}