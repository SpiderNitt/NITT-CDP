<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'firstname' => 'Tom',
            'lastname' => 'Riddle',
            'username' => 'Voldy7',
            'email' => 'voldy@harrypotterfan.com',
            'password' => Hash::make('iloveyouharry'),
            'dob' => '1825-6-7',
            'admin' => TRUE
        ]);
        User::create([
            'firstname' => 'Mom',
            'lastname' => 'Biddle',
            'username' => 'Goldy6',
            'email' => 'goldy@harrypotterfan.com',
            'password' => Hash::make('iloveyouharry'),
            'dob' => '1835-6-7',
            'admin' => FALSE
        ]);
        User::create([
            'firstname' => 'Bomb',
            'lastname' => 'Kiddle',
            'username' => 'Boldy8',
            'email' => 'boldy@harrypotterfan.com',
            'password' => Hash::make('iloveyouharry'),
            'dob' => '1845-6-7',
            'admin' => FALSE
        ]);
    }
}
