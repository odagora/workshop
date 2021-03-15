<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewEdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_allows_only_authenticated_users(){
        $this->signOut()
            ->withExceptionHandling()
            ->get('app/edocs')
            ->assertRedirect('app/login');
    }

    /**
     * @test
     */
    public function it_can_display_all_edocs(){
        $edoc = create('App\Edocs');
        $this->get('app/edocs')
            ->assertSee($edoc->license);
    }
}