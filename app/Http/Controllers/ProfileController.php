<?php

namespace App\Http\Controllers;

use App\Experience;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::first();

        return view('users/edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'experience.*.technology' => 'between:2,10',
            'experience.*.years'      => 'required_with:technology.*|integer'
        ]);

        $experiences = [];

        $user = User::first();

        $user->experiences()->delete();

        foreach ($request->get('experience') as $item) {
            if (empty ($item['technology'])) {
                continue;
            }

            $experiences[] = new Experience([
                'name'  => $item['technology'],
                'years' => $item['years']
            ]);
        }

        $user->experiences()->saveMany($experiences);

        return back();
    }
}
