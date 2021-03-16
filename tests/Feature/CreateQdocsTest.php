<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateQdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_create_qdocs(){
        $qdoc = create('App\Qdocs');

        $this->withExceptionHandling()
            ->post('app/qdocs', $qdoc->toArray());

        $this->assertEquals(1, \App\Qdocs::all()->count());

        $this->get('app/qdocs')
            ->assertSee($qdoc->license);
    }
}