<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContribuyenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contribuyentes')->insert([
            ["ci"=>'0',"contribuyente"=>"SN"],
            ["ci"=>'1010',"contribuyente"=>"JUAN LOPEZ"],
            ["ci"=>'2020',"contribuyente"=>"ALEJANDRO LOPEZ"],
        ]);
    }
}
