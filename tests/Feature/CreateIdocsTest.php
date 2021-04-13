<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateIdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_create_idocs(){
        $idoc = create('App\Idocs');

        $this->withExceptionHandling()
            ->post('app/idocs', $idoc->toArray());

        $this->assertEquals(2, \App\Idocs::all()->count());

        $this->get('app/idocs')
            ->assertSee($idoc->license);
    }
}