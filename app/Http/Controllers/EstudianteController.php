<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function index(){
        return Estudiante::all();
    }

    public function show($id){
        $estudiante = Estudiante::find($id);
        if(isset($estudiante)){
            return response()->json([
                'data' => $estudiante,
                'mensaje' => 'Estudiante encontrado',
            ]);
        }else{
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe estudiante',
            ]);
        }
    }

    public function store(Request $request){
        $ver = $request->input();
        $guardar = Estudiante::create($ver);
        return response()->json([
            'data' => $guardar,
            'mensaje' => 'Se actualizo estudiante',
        ]);
    }

    public function update(Request $request, $id){
        $verficar = Estudiante::find($id);
        if(isset($verficar)){
            $verficar->Nombre = $request->Nombre;
            $verficar->Email = $request->Email;
            $verficar->Direccion = $request->Direccion;
            $verficar->Ciudad = $request->Ciudad;
            $verficar->Semestre = $request->Semestre;
            $verficar->Documento = $request->Documento;
            $verficar->Telefono = $request->Telefono;
            if($verficar->save()){
                return response()->json([
                    'data' => $verficar,
                    'mensaje' => 'Se actualizo estudiante',
                ]);
            }
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>'No existe',
            ]);
        }
    }

    public function destroy($id){
        $estudiante = Estudiante::find($id);
        if(isset($estudiante)){
            $eliminar = Estudiante::destroy($id);
            if($eliminar){
                return response()->json([
                'data' => [],
                'mensaje' => 'Estudiante eliminado',
            ]);
            }else{
                return response()->json([
                    'error' => true,
                    'mensaje' => 'No existe estudiante',
                ]);
            }

        }else{
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe estudiante',
            ]);
        }
    }
}
