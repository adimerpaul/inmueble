<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipos')->insert([
            ['nombre'=>'DRENAJE','tipo'=>'NATURAL'],
            ['nombre'=>'CN. COD.','tipo'=>'NATURAL'],
            ['nombre'=>'I.T.','tipo'=>'NATURAL'],
            ['nombre'=>'C.GRAL.','tipo'=>'NATURAL'],
            ['nombre'=>'R.IMP.','tipo'=>'NATURAL'],
            ['nombre'=>'MOD. DATOS','tipo'=>'NATURAL'],
            ['nombre'=>'RECAT.','tipo'=>'NATURAL'],
            ['nombre'=>'MOD. C.I.','tipo'=>'NATURAL'],
            ['nombre'=>'C. BANC.','tipo'=>'NATURAL'],
            ['nombre'=>'CN. NOMB','tipo'=>'NATURAL'],
            ['nombre'=>'EXEDENCIA','tipo'=>'NATURAL'],
            ['nombre'=>'R. IMP.','tipo'=>'NATURAL'],
            ['nombre'=>'REC. COD.','tipo'=>'NATURAL'],
            ['nombre'=>'CN','tipo'=>'NATURAL'],
            ['nombre'=>'C.C.','tipo'=>'NATURAL'],
            ['nombre'=>'REC.','tipo'=>'NATURAL'],
            ['nombre'=>'R. IMP.','tipo'=>'NATURAL'],
            ['nombre'=>'REG. IMP.','tipo'=>'NATURAL'],
            ['nombre'=>'C. GG','tipo'=>'NATURAL'],
            ['nombre'=>'C.CAT.','tipo'=>'NATURAL'],

            ['nombre'=>'1','tipo'=>'JURIDICO'],

            ['nombre'=>'2','tipo'=>'BAJA'],

            ]);
    }
}
