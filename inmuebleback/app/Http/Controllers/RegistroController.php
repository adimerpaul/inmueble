<?php

namespace App\Http\Controllers;

use App\Models\Contribuyente;
use App\Models\Registro;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reporte($tipo){
//        return $tipo;
        return Registro::with('user')->where('tipo2',$tipo)->get();
    }
    public function detallesdia(Request $request)
    {
        return $request;
    }

    public function index(Request $request)
    {
        //
        return Registro::max('numero');
    }
    public function consulta(Request $request){
        $inicio = strtotime($request->fecha2);
        $fin = strtotime($request->fecha1);
//        $fin = strtotime(date('Y-m-d', strtotime("-1 year")));
        while($fin <= $inicio) {
//            echo date('Y-m-d', $fin).' - ';
            $cantidad=Registro::where('fecha',date('Y-m-d', $fin))->get()->count();
            $fecha[]=["fecha"=>date('Y-m-d', $fin),'cantidad'=>$cantidad];
//            Registro::where('tipo','C. GG.')->get();
//            echo date('y', $month)."----- <br>";
//            $query=DB::connection('tasas')->table('archi'.date('y', $month))->where('cantidad','like','%'.$cantidad.'%');
//            if ($query->count()>0){
////                echo date('y',$month)."---<br>";
////                array_push($gestiones,['gestion'=>date('Y',$month)]);
//                array_push($gestiones,$query->get());
//            }
            $fin = strtotime("+1 day", $fin);
//            echo $fin;
//            echo $dia.'  ';
        }
//        return response()->json(['fechas'=>$fecha]);
        return $fecha;
//        return $request;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mes(Request $request){
        return Registro::whereYear('fecha',$request->anio)
            ->whereMonth('fecha',$request->mes)
            ->with('user')
            ->get();

    }
    public function anio(Request $request){
        return Registro::whereYear('fecha',$request->anio)
//            ->whereMonth('fecha',$request->mes)
            ->with('user')
            ->get();
    }
    public function store(Request $request)
    {
        //return $request;
//        return Contribuyente::where('ci',$request->ci)->get()->count();
        if (Contribuyente::where('ci',$request->ci)->get()->count()==0){
            $contribuyente=new Contribuyente();
            $contribuyente->ci=$request->ci;
            $contribuyente->contribuyente=strtoupper($request->contribuyente);
            $contribuyente->save();
            $contribuyente_id=$contribuyente->id;
        }else{
            $contribuyente=Contribuyente::where('ci',$request->ci)->firstOrFail();
            $contribuyente=Contribuyente::find($contribuyente->id);
            $contribuyente->contribuyente=strtoupper($request->contribuyente);
            $contribuyente->save();
            $contribuyente_id=$contribuyente->id;
        }

        $registro= new Registro();
        $num=Registro::where('gestion',date('Y'))->get()->count()+1;
        $registro->num=$num;
        $registro->ci=$request->ci;
        $registro->contribuyente=strtoupper($request->contribuyente);
        $registro->numero=$request->numero;
        $registro->numtramite=$request->numtramite;
        $registro->numhoja=$request->numhoja;
        $registro->lugar=strtoupper($request->lugar);
        $registro->tipo=$request->tipo;
        $registro->fecha=date('Y-m-d');
        $registro->hora=date('H:i:s');
        $registro->tipo2=$request->tipo2;
        $registro->gestion=date('Y');
        $registro->detalle=$request->detalle;
        $registro->user_id=$request->user()->id;
        $registro->contribuyente_id=$contribuyente_id;
        $registro->tipo_id=$request->tipo_id;
        $registro->save();
        return $registro;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fecha)
    {
        return Registro::whereDate('fecha',$fecha)->with('user')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        if ($registro->tipo3=='ACTIVO'){
            $registro->tipo3='INACTIVO';
        }else{
            $registro->tipo3='ACTIVO';
        }
        $registro->save();
        return $registro->tipo3;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
