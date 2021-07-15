<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $user->name = "Prueba";
        $user->email = "prueba@devtest.com";
        $user->password = bcrypt('secret');
        // $user->is_admin = true;
        $user->is_admin = false;
        $user->save();
    }
}
