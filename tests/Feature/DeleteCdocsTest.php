<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class DeleteCdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_delete_cdocs(){
        $cdoc = create('App\Cdocs');

        $this->delete("app/cdocs/{$cdoc->id}")
            ->assertRedirect('app/cdocs');

        $this->get('app/cdocs')
            ->assertDontSee($cdoc->license);
    }
}