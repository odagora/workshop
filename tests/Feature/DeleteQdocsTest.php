<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteQdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_qdocs(){
        $qdoc = create('App\Qdocs');

        $this->delete("app/qdocs/{$qdoc->id}")
            ->assertRedirect('app/qdocs');

        $this->get('app/qdocs')
            ->assertDontSee($qdoc->license);
    }
}