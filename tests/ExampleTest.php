<?php

namespace Rayblair\UrlActivity\Tests;

use Orchestra\Testbench\TestCase;
use Rayblair\UrlActivity\UrlActivityServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [UrlActivityServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
