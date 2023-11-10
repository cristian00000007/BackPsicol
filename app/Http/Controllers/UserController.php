<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ver = $request->input();
        $ver["contrasena"] = Hash::make(trim($request->contrasena));

        $guardar = User::create($ver);
        return response()->json([
            'data' => $guardar,
            'mensaje' => 'Se actualizo usuario',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::find($id);
        if(isset($usuario)){
            return response()->json([
                'data' => $usuario,
                'mensaje' => 'Usuario encontrado',
            ]);
        }else{
            return response()->json([
                'error' => true,
                'mensaje' => 'No existe Usuario',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $verficar = User::find($id);
        if(isset($verficar)){
            $verficar->nombre = $request->nombre;
            $verficar->email = $request->email;
            $verficar->rol = $request->rol;
            $verficar["contrasena"] = Hash::make(trim($request->contrasena));
            if($verficar->save()){
                return response()->json([
                    'data' => $verficar,
                    'mensaje' => 'Se actualizo usuario',
                ]);
            }
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>'No existe',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = User::find($id);
        if(isset($usuario)){
            $eliminar = User::destroy($id);
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
