<?php
namespace Tests\Feature;

use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateCdocsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_allows_only_authenticated_users(){
        $this->signOut()
            ->withExceptionHandling()
            ->get('app/cdocs')
            ->assertRedirect('app/login');
    }
    /**
     * @test
     */
    public function it_can_create_cdocs(){
        $cdoc = create('App\Cdocs');

        $this->withExceptionHandling()
            ->post('app/cdocs', $cdoc->toArray());

        $this->assertEquals(2, \App\Cdocs::all()->count());

        $this->withExceptionHandling()
            ->get('app/cdocs')
            ->assertSee($cdoc->license);

    }
    /**
     * @test
     */
    public function it_cannot_create_cdoc_without_e_firstname(){
        $this->from('app/cdocs/create')
            ->postCdoc(['e_firstname' => null])
            ->assertRedirect('app/cdocs/create');
    }

    /**
     * @test
     */
    public function it_cannot_create_cdoc_without_c_firstname(){
        $this->from('app/cdocs/create')
            ->postCdoc(['c_firstname' => null])
            ->assertRedirect('app/cdocs/create');
    }

    public function postCdoc($overrides = []){
        $cdoc = make('App\Cdocs', $overrides);

        return $this->withExceptionHandling()->post('app/cdocs', $cdoc->toArray());
    }
}