<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteOTdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_otdocs(){
        $otDoc = create('App\Otdocs');

        $this->delete("app/otdocs/{$otDoc->id}")
            ->assertRedirect('app/otdocs');

        $this->get('app/otdocs')
            ->assertDontSee($otDoc->license);
    }
}