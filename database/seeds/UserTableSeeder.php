<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'first_name' => 'Duilio',
            'last_name' => 'Palacios',
            'email' => 'admin@styde.net',
            'password' => bcrypt('laravel')
        ]);

        factory(User::class)->times(4)->create();
    }
}
