<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteIdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_idocs(){
        $idoc = create('App\Idocs');

        $this->delete("app/idocs/{$idoc->id}")
            ->assertRedirect('app/idocs');

        $this->get('app/idocs')
            ->assertDontSee($idoc->license);
    }
}