<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CancelEdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_cancel_edocs(){
        $edoc = create('App\Edocs');
        $newEdoc = make('App\Edocs', ['status' => 'cancelled']);

        $this->withExceptionHandling()
            ->put("app/edocs/{$edoc->id}", $newEdoc->toArray());

        $this->assertEquals($newEdoc->status, 'cancelled');
    }
}