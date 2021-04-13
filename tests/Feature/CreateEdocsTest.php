<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateEdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_create_edocs(){
        $edoc = create('App\Edocs');

        $this->withExceptionHandling()
            ->post('app/edocs', $edoc->toArray());

        $this->assertEquals(2, \App\Edocs::all()->count());

        $this->get('app/edocs')
            ->assertSee($edoc->license);
    }
}