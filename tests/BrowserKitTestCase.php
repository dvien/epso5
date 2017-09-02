<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Laravel\BrowserKitTesting\TestCase as BaseTestCase;
use Tests\Helpers\BaseHelpers;
use Tests\Helpers\UsersHelpers;

abstract class BrowserKitTestCase extends BaseTestCase
{
    use BaseHelpers,UsersHelpers;
    
    /**
     * The base URL of the application.
     *
     * @var string
     */
    public $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
