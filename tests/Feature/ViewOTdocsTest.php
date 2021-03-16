<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewOTdocsTest extends TestCase
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
    public function it_can_display_all_otdocs(){
        $ot_doc = create('App\Otdocs');
        $this->get('app/otdocs')
            ->assertSee($ot_doc->license);
    }
}