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
        DB::table('contribuyente')->insert([
            ["ci"=>'1010',"contribuyente"=>"ADIMER PAUL CHAMBI AJATA"]
        ]);
    }
}
