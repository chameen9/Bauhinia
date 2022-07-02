<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Chameen Sandeepa',
            'email'=>'chameensandeepa9@gmail.com',
            'password'=>Hash::make('password'),
            'remember_token'=>str_random(10),
        ]);
    }
}
