<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{

    public function index(){
        $sql=DB::select(" select * from empleados_detalle ");
        return view("listado")->with("datos", $sql);
    }

    public function alta(){
        $prov=DB::select(" select id_provincia,provincia from provincia ");
        $doc=DB::select(" select id_tipo_documento, tipo_documento from tipo_documento ");
        return view("alta")->with(["provincias" => $prov,"tipodocumento" => $doc]);
    }

    public function guardar( Request $request){
        $sql=DB::insert(" insert into empleados ( apellido,nombre,direccion,localidad,id_tipo_documento,nrodocumento, codigopostal,id_provincia ) values ( ?,?,?,?,?,?,?,? ) ",[
            $request -> apellido,
            $request -> nombre,
            $request -> direccion,
            $request -> localidad,
            $request -> id_tipo_documento,
            $request -> nrodocumento, 
            $request -> codigopostal,
            $request -> id_provincia
        ]);
        if ($sql == true) {
            return back() -> with ("correcto","Empleado registrado correctamente");
        } else {
            return back() -> with ("incorrecto","Error al registrar");
        }
        
    }
 
}
