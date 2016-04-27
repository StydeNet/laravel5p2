<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseTransactions;

    function test_user_can_register()
    {
        $this->visit('/')
            ->click('Register')
            ->see('Register')
            ->seePageIs('register')
            ->type('Duilio', 'first_name')
            ->type('Palacios', 'last_name')
            ->type('admin@styde.net', 'email')
            ->type('laravel', 'password')
            ->type('laravel', 'password_confirmation')
            ->press('Register');

        $this->seeCredentials([
            'first_name' => 'Duilio',
            'last_name'  => 'Palacios',
            'email'      => 'admin@styde.net',
            'password'   => 'laravel',
        ]);

        $this->see('/')
            ->see('Welcome')
            ->see('Duilio Palacios');
    }
}
