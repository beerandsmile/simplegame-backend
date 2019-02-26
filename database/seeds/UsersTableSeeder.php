<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'bear',
            'email' => 'bear@buhojmedved.ru',
            'password' => Hash::make('password'),
            'events' => json_encode(['personal' => Hash::make('bear@buhojmedved.ru')]),
        ]);

        DB::table('users')->insert([
            'name' => 'beer',
            'email' => 'beer@buhojmedved.ru',
            'password' => Hash::make('password'),
            'events' => json_encode(['personal' => Hash::make('beer@buhojmedved.ru')]),
        ]);
    }
}
