<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewQdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_allows_only_authenticated_users(){
        $this->signOut()
            ->withExceptionHandling()
            ->get('app/qdocs')
            ->assertRedirect('app/login');
    }

    /**
     * @test
     */
    public function it_can_display_all_qdocs(){
        $qdoc = create('App\Qdocs');
        $this->get('app/qdocs')
            ->assertSee($qdoc->license);
    }
}