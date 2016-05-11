<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        abort_unless($user->isCollaborator(), 404, 'No se puede editar el administrador');

        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        abort_if($user->isAdmin(), 404, 'El usuario con ID 1 no puede ser editado');

        $this->validate($request, [
            'email' => 'required'
        ]);

        $user->fill($request->all());

        $user->save();

        return back()->with('success', true);
    }
}
