<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Mail\MailTracking;

class SendCdocsMailTest extends TestCase
{
    use DatabaseMigrations;
    use MailTracking;

    //Laracast example
    /**
     * @test
     */

    public function it_can_send_cdocs_mail(){
        $cdoc = create('App\Cdocs');

        //Assert email was sent with custom function
        $this->withExceptionHandling()
            ->get("app/cdocs/{$cdoc->id}/mail");

        $this->seeEmailWasSent();
    }
}