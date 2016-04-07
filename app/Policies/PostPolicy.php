<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view()
    {
        return true;
    }

    public function edit()
    {
        return true;
    }
}
