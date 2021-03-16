<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Mail\MailTracking;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SendQdocsMailTest extends TestCase
{
    use DatabaseMigrations;
    use MailTracking;
    /**
     * @test
     */
    public function it_can_send_qdocs_mail(){
        $qdoc = create('App\Qdocs');

        $this->get("app/qdocs/{$qdoc->id}/mail");
        $this->seeEmailWasSent();
    }
}