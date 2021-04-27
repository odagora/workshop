<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CancelQdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_cancel_qdocs(){
        $qdoc = create('App\Qdocs');
        $newQdoc = make('App\Qdocs', ['status' => 'cancelled']);

        $this->withExceptionHandling()
            ->put("app/qdocs/{$qdoc->id}", $newQdoc->toArray());

        $this->assertEquals($newQdoc->status, 'cancelled');
    }
}