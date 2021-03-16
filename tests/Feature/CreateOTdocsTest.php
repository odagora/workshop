<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateOTdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_allows_only_authenticated_users(){
        $this->signOut()
        ->withExceptionHandling()
        ->get('app/otdocs')
        ->assertRedirect('app/login');
    }
    /**
     * @test
     */
    public function it_can_create_otdocs(){
        $ot_doc = create('App\Otdocs');

        $this->withExceptionHandling()
            ->post('app/otdocs', $ot_doc->toArray());

        $this->assertEquals(1, \App\Otdocs::all()->count());

        $this->withExceptionHandling()
            ->get('app/otdocs')
            ->assertSee($ot_doc->license);
    }
}