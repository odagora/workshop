<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewIdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_allows_only_authenticated_users(){
        $this->signOut()
            ->withExceptionHandling()
            ->get('app/idocs')
            ->assertRedirect('app/login');
    }

    /**
     * @test
     */
    public function it_can_display_all_idocs(){
        $idoc = create('App\Idocs');
        $this->get('app/idocs')
            ->assertSee($idoc->license);
    }
}