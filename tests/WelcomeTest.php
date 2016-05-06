<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class WelcomeTest extends TestCase
{
    function test_welcome_user()
    {
        $this->visit('/')
            ->dontSeeElement('img', ['src' => 'http://laravel5.2.app/laravel_logo.png', 'alt' => 'Styde']);
    }
}
