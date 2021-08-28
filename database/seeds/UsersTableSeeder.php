<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        /*
        User::create([
            'name' => 'Nelcione Dias',
            'email' => 'nelcionedias@gmail.com',
            'password' => bcrypt('123456'),//metodo que criptografa a senha nunca deixe as senha sem criptografia
        ]);*/

    }
}
