<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Disable CSRF for tests (cover both class paths)
        $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);
        if (class_exists(\App\Http\Middleware\VerifyCsrfToken::class)) {
            $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        }
    }
}
