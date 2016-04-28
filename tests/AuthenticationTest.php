<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthenticationTest extends TestCase
{
    use DatabaseTransactions;

    protected $firstName = 'Duilio';
    protected $lastName = 'Palacios';
    protected $email = 'admin@styde.net';
    protected $password = 'laravel';
    protected $fullName = 'Duilio Palacios';

    function test_user_can_register()
    {
        $this->visit('/')
            ->click('Register')
            ->see('Register')
            ->seePageIs('register')
            ->type($this->firstName, 'first_name')
            ->type($this->lastName, 'last_name')
            ->type($this->email, 'email')
            ->type($this->password, 'password')
            ->type($this->password, 'password_confirmation')
            ->press('Register');

        $this->seeCredentials([
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName,
            'email'      => $this->email,
            'password'   => $this->password,
        ]);

        $this->see('/')
            ->see('Welcome')
            ->see($this->fullName);
    }

    function test_a_user_can_login()
    {
        $user = $this->createUser();

        $this->visit('/')
            ->click('Login')
            ->type($this->email, 'email')
            ->type($this->password, 'password')
            ->press('Login');

        $this->seeIsAuthenticated()
            ->seeIsAuthenticatedAs($user);

        $this->seePageIs('/')
            ->see('Welcome')
            ->see($this->fullName);
    }

    function test_a_user_can_logout()
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('/')
            ->seeLink('Logout')
            ->click('Logout');

        $this->dontSeeIsAuthenticated();

        $this->visit('/')
            ->dontSee($this->fullName);
    }

    function test_an_admin_can_login_as_another_user()
    {
        $user = $this->createUser();

        $anotherUser = factory(User::class)->create();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('/admin/login-as/'.$anotherUser->id)
            ->seePageIs('/')
            ->see($anotherUser->name)
            ->seeIsAuthenticatedAs($anotherUser);
    }

    protected function createUser()
    {
        return factory(User::class)->create([
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName,
            'email'      => $this->email,
            'password'   => bcrypt($this->password),
        ]);;
    }

}



