<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateIdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_update_idocs(){
        $type = create('App\Type');
        $idoc = create('App\Idocs');
        $newIdoc = make('App\Idocs', ['make' => $type->make_id, 'type' => $type->name]);

        $this->withExceptionHandling()
            ->put("app/idocs/{$idoc->id}", $newIdoc->toArray())
            ->assertRedirect("app/idocs/{$idoc->id}");

        $this->get('/app/idocs')
            ->assertSee($newIdoc->license);
    }

    /**
     * @test
     */
    public function it_cannot_update_idoc_without_e_firstname(){
        $this->updateIdoc(['e_firstname' => null])
            ->assertSessionHasErrors('e_firstname');
    }

    public function updateIdoc($overrides = []){
        $idoc = create('App\Idocs');
        $newIdoc = make('App\Idocs', $overrides);

        return $this->withExceptionHandling()->put("app/idocs/{$idoc->id}", $newIdoc->toArray());
    }
}

