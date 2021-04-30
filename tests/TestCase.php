<?php

namespace Tests;

use Exception;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Throwable;

abstract class TestCase extends BaseTestCase
{
    protected $user;
    use CreatesApplication;

    protected function setUp () :void
    {
        parent::setUp();
        $this->user = create('App\User');
        $this->signIn($this->user)
            ->disableExceptionHandling();
    }

    protected function disableExceptionHandling ()
    {
        $this->oldExceptionHandler = app()->make(ExceptionHandler::class);
        app()->instance(ExceptionHandler::class, new PassThroughHandler);
    }

    protected function withExceptionHandling ()
    {
        app()->instance(ExceptionHandler::class, $this->oldExceptionHandler);
        return $this;
    }

    protected function signIn($user)
    {
        $this->actingAs($user);
        return $this;
    }

    protected function signOut(){
        $this->post('app/logout');
        return $this;
    }

    /**
     * Set the URL of the previous request.
     *
     * @param  string  $url
     * @return $this
     */
    public function from(string $url)
    {
        $this->app['session']->setPreviousUrl($url);

        return $this;
    }
}

class PassThroughHandler extends Handler
{
    public function __construct () {}

    public function report (Throwable $e) {}

    public function render ($request, Throwable $e)
    {
        throw $e;
    }
}