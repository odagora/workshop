<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteEdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_edocs(){
        $edoc = create('App\Edocs');

        $this->delete("app/edocs/{$edoc->id}")
            ->assertRedirect('app/edocs');

        $this->get('app/edocs')
            ->assertDontSee($edoc->license);
    }
}