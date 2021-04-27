<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CancelCdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_cancel_cdocs(){
        $cdoc = create('App\Cdocs');
        $newCdoc = make('App\Cdocs', ['status' => 'cancelled']);

        $this->withExceptionHandling()
        ->put("/app/cdocs/{$cdoc->id}", $newCdoc->toArray());

        $this->assertEquals($newCdoc->status, 'cancelled');
    }
}