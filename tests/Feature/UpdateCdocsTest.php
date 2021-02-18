<?php
namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateCdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_update_cdocs(){
        $type = create('App\Type');
        $cdoc = create('App\Cdocs');
        $newCdoc = make('App\Cdocs', ['make' => $type->make_id, 'type' => $type->name]);

        $this->withExceptionHandling()->put("/app/cdocs/{$cdoc->id}", $newCdoc->toArray())
            ->assertRedirect("/app/cdocs/{$cdoc->id}");

        $this->get('/app/cdocs')
            ->assertSee($newCdoc->license);
    }
    /**
     * @test
     */
    public function it_cannot_update_cdoc_without_e_firstname(){
        $this->updateCdoc(['e_firstname' => null])
            ->assertSessionHasErrors('e_firstname');
    }

    /**
     * @test
     */
    public function it_cannot_update_cdoc_without_c_firstname(){
        $this->updateCdoc(['c_firstname' => null])
            ->assertSessionHasErrors('c_firstname');
    }

    public function updateCdoc($overrides = []){
        $cdoc = create('App\Cdocs');
        $newCdoc = make('App\Cdocs', $overrides);

        return $this->withExceptionHandling()->put("/app/cdocs/{$cdoc->id}", $newCdoc->toArray());
    }
}