<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email'=>'admin@gamo.com',
                'password'=>Hash::make('G4M02021'),
                'name'=>'admin',
                'fechalimite'=>'9999-12-31'
            ],
            [
                'email'=>'adimer101@gmail.com',
                'password'=>Hash::make('7336199'),
                'name'=>'Adimer Paul Chambi Ajata',
                'fechalimite'=>'9999-12-31'
            ],
        ]);
    }
}
