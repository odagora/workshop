<?php

namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateEdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_update_edocs(){
        $type = create('App\Type');
        $edoc = create('App\Edocs');
        $newEdoc = make('App\Edocs', ['make' => $type->make_id, 'type' => $type->name]);

        $this->withExceptionHandling()
            ->put("app/edocs/{$edoc->id}", $newEdoc->toArray())
            ->assertRedirect("app/edocs/{$edoc->id}");

        $this->get('app/edocs')
            ->assertSee($newEdoc->license);
    }
    /**
     * @test
     */
    public function it_cannot_update_edoc_without_e_firstname(){
        $this->updateEdoc(['e_firstname' => null])
            ->assertSessionHasErrors('e_firstname');
    }

    public function updateEdoc($overrides = []){
        $edoc = create('App\Edocs');
        $newEdoc = make('App\Edocs', $overrides);

        return $this->withExceptionHandling()->put("app/edocs/{$edoc->id}", $newEdoc->toArray());
    }
}