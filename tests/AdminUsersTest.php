<?php

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminUsersTest extends TestCase
{
    use DatabaseTransactions;

    function test_list_users()
    {
        $user = $this->createUser();

        $this->actingAs($user)
            ->visit('admin/users')
            ->see('Users')
            ->within('#content', function () use ($user) {
                $this->see($user->name)
                    ->see($user->email)
                    ->seeLink('Editar');
            });
    }

}
