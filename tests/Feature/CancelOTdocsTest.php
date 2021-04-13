<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CancelOTdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_cancel_otdocs(){
        $otDoc = create('App\Otdocs');
        $newOtDoc = make('App\Otdocs', ['status' => 'cancelled']);

        $this->withExceptionHandling()
            ->put("app/otdocs/{$otDoc->id}", $newOtDoc->toArray());

        $this->assertEquals($newOtDoc->status, 'cancelled');
    }
}