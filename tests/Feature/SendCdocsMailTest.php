<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Mail\CdocSent;
use Mail;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Mail\MailTracking;

class SendCdocsMailTest extends TestCase
{
    use DatabaseMigrations;
    use MailTracking;

    //Laracast example
    /**
     * @test
     */

    public function it_can_send_a_cdocs_mail(){
        // Mail::raw('plain text message', function ($message) {
        //     $message->from('john@johndoe.com', 'John Doe');
        //     $message->to('john@johndoe.com', 'John Doe');
        // });

        // Assert email was sent with custom function
        // $this->seeEmailWasNotSent();
        
        $cdoc = create('App\Cdocs');

        // dd($cdoc->id);
        // dd($this->get("app/cdocs/{$cdoc->id}/pdf"));

        //
        // $date = date('dmY', strtotime($cdoc->created_at));
        // $doc = $cdoc->doc_number + 762;
        // $filename = $doc.'_'.$cdoc->license.'_'.$date.'.pdf';
        // $path = storage_path('app/'.$filename);
        // $bool = true;

        // //Store the file in storage path
        // $cdoc_test = new File(base_path('tests/resources/example.pdf'));
        // Storage::putFileAs('/', $cdoc_test, $filename);

        //Generate pdf file
        // \PDF::shouldReceive('loadView')
        //     ->once()
        //     ->andReturnSelf()
        //     ->getMock()
        //     ->shouldReceive('setPaper')
        //     ->once()
        //     ->andReturnSelf()
        //     ->getMock()
        //     ->shouldReceive('setOption')
        //     ->times(5)
        //     ->andReturnSelf()
        //     ->getMock()
        //     ->shouldReceive('save')
        //     ->once()
        //     ->with($path, $bool)
        //     ->andReturnSelf();
        
        //Make the assertion on mail route
        $this->withExceptionHandling()
             ->get("app/cdocs/{$cdoc->id}/mail")
             ->seeEmailWasSent();
            //  ->assertSuccessful();
            // ->assertEquals(1, $cdoc->id);
             
        // $content = [
        //     'client' => 'John Doe',
        //     'body' => 'body',
        //     'button' => 'CTA'
        // ];

        // $cdoc_test = new File(base_path('tests/resources/example.pdf'));

        // Storage::putFileAs('/', $cdoc_test, 'cdoc.pdf');

        // $attachment =  storage_path().'/app/cdoc.pdf';
        
        // Mail::to('foo@example.com')->bcc('bar@example.com')->send(new CdocSent('Cotización', $content, $attachment));

        // //Assert email was sent with custom function
        // $this->withExceptionHandling()
        //     ->seeEmailWasSent();
    }
}