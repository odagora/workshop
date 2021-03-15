<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Mail\MailTracking;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SendEdocsMailTest extends TestCase
{
    use DatabaseMigrations;
    use MailTracking;
    /**
     * @test
     */
    public function it_can_send_edocs_mail(){
        $edoc = create('App\Edocs');

        $this->get("app/edocs/{$edoc->id}/mail");
        $this->seeEmailWasSent();
    }
}