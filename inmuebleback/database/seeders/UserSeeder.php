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
//            [
//                'email'=>'adimer101@gmail.com',
//                'password'=>Hash::make('7336199'),
//                'name'=>'Adimer Paul Chambi Ajata',
//                'fechalimite'=>'9999-12-31'
//            ],
            [
                'email'=>'adofranco@gamo.com',
                'password'=>Hash::make('3093761'),
                'name'=>'Dolores Lourdes franco Zambrana',
                'fechalimite'=>'9999-12-31'
            ],
            [
                'email'=>'hechoque@gamo.com',
                'password'=>Hash::make('3540800'),
                'name'=>'Hernán choque Fernández',
                'fechalimite'=>'9999-12-31'
            ],
            [
                'email'=>'caledezma@gamo.com',
                'password'=>Hash::make('2737871'),
                'name'=>'Carola Muana Ledezma Calatayud',
                'fechalimite'=>'9999-12-31'
            ],
            [
                'email'=>'wisalvatierra@gamo.com',
                'password'=>Hash::make('3530929'),
                'name'=>'William Salvatierra',
                'fechalimite'=>'9999-12-31'
            ],
            [
                'email'=>'jocox@gamo.com',
                'password'=>Hash::make('3514515'),
                'name'=>'Jorge Cox Velasquez',
                'fechalimite'=>'9999-12-31'
            ],
            [
                'email'=>'cocadima@gamo.com',
                'password'=>Hash::make('3108812'),
                'name'=>'Carlos Cadima',
                'fechalimite'=>'9999-12-31'
            ],

            [
                'email'=>'selopez@gamo.com',
                'password'=>Hash::make('3518701'),
                'name'=>'Sebastian Lopez Hidalgo',
                'fechalimite'=>'9999-12-31'
            ],
        ]);
    }
}
