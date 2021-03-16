<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateQdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_update_qdocs(){
        $type = create('App\Type');
        $qdoc = create('App\Qdocs');
        $newQdoc = make('App\Qdocs', ['make' => $type->make_id, 'type' => $type->name]);

        $this->withExceptionHandling()
            ->put("app/qdocs/{$qdoc->id}", $newQdoc->toArray())
            ->assertRedirect("app/qdocs/{$qdoc->id}");
        
            $this->get('app/qdocs')
                ->assertSee($newQdoc->license);
    }
}