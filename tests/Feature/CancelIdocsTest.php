<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CancelIdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_cancel_idocs(){
        $idoc = create('App\Idocs');
        $newIdoc = make('App\Idocs', ['status' => 'cancelled']);

        $this->withExceptionHandling()
            ->put("app/idocs/{$idoc->id}", $newIdoc->toArray());

        $this->assertEquals($newIdoc->status, 'cancelled');
    }
}

