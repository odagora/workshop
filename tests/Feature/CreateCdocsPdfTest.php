<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PDF;

class CreateCdocsPdfTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function it_can_download_a_cdocs_pdf(){
        //Create Cdoc document
        $cdoc = create('App\Cdocs');
        $date = date('dmY', strtotime($cdoc->created_at));
        $doc = $cdoc->doc_number + 762;
        $filename = $doc.'_'.$cdoc->license.'_'.$date.'.pdf';
        $path = storage_path('app/'.$filename);
        $bool = true;

        //Store the file in storage path
        $cdoc_test = new File(base_path('tests/resources/example.pdf'));
        Storage::putFileAs('/', $cdoc_test, $filename);

        //Generate pdf file
        \PDF::shouldReceive('loadView')
            ->once()
            ->andReturnSelf()
            ->getMock()
            ->shouldReceive('setPaper')
            ->once()
            ->andReturnSelf()
            ->getMock()
            ->shouldReceive('setOption')
            ->times(5)
            ->andReturnSelf()
            ->getMock()
            ->shouldReceive('save')
            ->once()
            ->with($path, $bool)
            ->andReturnSelf();

        //Make the assertion on pdf route
        $this->get("app/cdocs/{$cdoc->id}/pdf")
            ->assertSuccessful();
    }
}