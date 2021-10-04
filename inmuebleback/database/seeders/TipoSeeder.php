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
            
            
            ['nombre'=>'BALANCE','tipo'=>'JURIDICO'],
            ['nombre'=>'TABLAS','tipo'=>'JURIDICO'],
            ['nombre'=>'EXENCION','tipo'=>'JURIDICO'],
            ['nombre'=>'HABILITACION','tipo'=>'JURIDICO'],
            ['nombre'=>'C. RAZON SOCIAL','tipo'=>'JURIDICO'],
            ['nombre'=>'AUTO EVALUACION','tipo'=>'JURIDICO'],
            ['nombre'=>'CN. DE APELLIDO','tipo'=>'JURIDICO'],
            ['nombre'=>'CAMBIO DE RAZON','tipo'=>'JURIDICO'],
            ['nombre'=>'V.EN LIBROS','tipo'=>'JURIDICO'],
            ['nombre'=>'CREDITO FISCAL','tipo'=>'JURIDICO'],
            ['nombre'=>'DESISTIMIENTO','tipo'=>'JURIDICO'],
            ['nombre'=>'M. LIBROS','tipo'=>'JURIDICO'],
            ['nombre'=>'APELLIDO','tipo'=>'JURIDICO'],
            ['nombre'=>'RESTITUCIO','tipo'=>'JURIDICO'],
            ['nombre'=>'BENEMERITO','tipo'=>'JURIDICO'],
            ['nombre'=>'V.LIBROS','tipo'=>'JURIDICO'],
            ['nombre'=>'COMPENSACION','tipo'=>'JURIDICO'],
             
            
            
            ['nombre'=>'BAJA','tipo'=>'BAJA'],
            ['nombre'=>'DESBLOQUEO','tipo'=>'BAJA'],
            ['nombre'=>'BLOQUEO','tipo'=>'BAJA'],
            ['nombre'=>'HABILITACION','tipo'=>'BAJA'],
            ['nombre'=>'COMPENSACION','tipo'=>'BAJA'],
            ['nombre'=>'REHABILITACION','tipo'=>'BAJA'],
            ['nombre'=>'ANULACION PL. P.','tipo'=>'BAJA'],

            ]);
    }
}
