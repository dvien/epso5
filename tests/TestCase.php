<?php

namespace Tests;

use App\Repositories\Users\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Helpers\BaseHelpers;
use Tests\Helpers\UsersHelpers;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use BaseHelpers,UsersHelpers;
}
