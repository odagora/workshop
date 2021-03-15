<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Mail\MailTracking;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SendIdocsMailTest extends TestCase
{
    use DatabaseMigrations;
    use MailTracking;
    /**
     * @test
     */
    public function it_can_send_idocs_mail(){
        $idoc = create('App\Idocs');

        $this->get("app/idocs/{$idoc->id}/mail");
        $this->seeEmailWasSent();
    }
}