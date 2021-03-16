<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateOTdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_update_otdocs(){
        $license = 'AAA001';
        $otDoc = create('App\Otdocs');
        $newOtDoc = make('App\Otdocs', ['license' => $license]);

        $this->withExceptionHandling()
            ->put("app/otdocs/{$otDoc->id}", $newOtDoc->toArray())
            ->assertRedirect("app/otdocs/{$otDoc->id}");

        $this->get('app/otdocs')
            ->assertSee($newOtDoc->license);
    }
}