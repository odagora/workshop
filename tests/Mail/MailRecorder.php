<?php

namespace Tests\Mail;

use Swift_Events_EventListener;
use Swift_Events_SendEvent;

/**
 * Class MailRecorder
 *
 * Catches the Swift message and then saves it to our test class so that we can inspect it
 *
 * laravel/framework/src/Illuminate/Mail/Transport/Transport.php
*/
class MailRecorder implements Swift_Events_EventListener {
    /**
     * @var mixed
    */
    protected $test;
    /**
     * MailRecorder constructor.
     *
     * @param mixed $test The PhpUnit TestCase class to use
    */
    public function __construct($test)
    {
        $this->test = $test;
    }

    /**
     * Called by Laravel before email is given to the transporter.
     *
     * Passes the email to the test, so that assertions can be ran against the messages.
     *
     * @param Swift_Events_SendEvent $event
    */
    public function beforeSendPerformed(Swift_Events_SendEvent $event) {
        $this->test->recordMail($event->getMessage());
    }
}