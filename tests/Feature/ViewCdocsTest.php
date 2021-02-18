<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewCdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_allows_only_authenticated_users(){
        $this->signOut()
            ->withExceptionHandling()
            ->get('app/cdocs')
            ->assertRedirect('app/login');
    }
    /**
     * @test
     */
    public function it_can_display_all_cdocs(){
        $cdoc = create('App\Cdocs');
        $this->withExceptionHandling()
            ->get('app/cdocs')
            ->assertSee($cdoc->license);
    }
}