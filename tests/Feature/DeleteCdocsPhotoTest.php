<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteCdocsPhotoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_cdocs_photos(){
        $cphoto = create('App\Cphotos');

        $this->withExceptionHandling()
        ->delete("app/cdocs/{$cphoto->doc_id}/photo/{$cphoto->id}");

        $this->get("app/cdocs/{$cphoto->doc_id}/photo")
            ->assertDontSee($cphoto->image_name);
    }
}